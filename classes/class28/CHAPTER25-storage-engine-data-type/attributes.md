# MariaDB Data Type Attributes and Constraints

This reference card shows all attributes and constraints that can be applied to columns in MariaDB tables.

## Basic Constraints

| Attribute | Description | Example |
|-----------|-------------|---------|
| `NOT NULL` | Column cannot contain NULL values | `name VARCHAR(100) NOT NULL` |
| `NULL` | Column can contain NULL values (default) | `middle_name VARCHAR(50) NULL` |
| `DEFAULT value` | Sets default value when no value provided | `status VARCHAR(20) DEFAULT 'active'` |
| `PRIMARY KEY` | Column is the primary key | `id INT PRIMARY KEY` |
| `UNIQUE` | All values in column must be unique | `email VARCHAR(100) UNIQUE` |
| `CHECK (expr)` | Values must satisfy the condition | `age INT CHECK (age >= 18)` |
| `COMMENT 'text'` | Documentation comment | `created_at TIMESTAMP COMMENT 'Creation date'` |

## Auto-Increment

| Attribute | Description | Example |
|-----------|-------------|---------|
| `AUTO_INCREMENT` | Automatically increase value | `id INT AUTO_INCREMENT PRIMARY KEY` |
| `AUTO_INCREMENT=value` | Set starting value | `AUTO_INCREMENT=1000` (table-level) |

## Indexing

| Attribute | Description | Example |
|-----------|-------------|---------|
| `KEY` or `INDEX` | Create regular index | `INDEX (last_name)` |
| `UNIQUE KEY` | Create unique index | `UNIQUE KEY (email)` |
| `FOREIGN KEY` | Reference another table | `FOREIGN KEY (dept_id) REFERENCES departments(id)` |
| `FULLTEXT KEY` | Text search index | `FULLTEXT KEY (content)` |
| `SPATIAL KEY` | Geometric data index | `SPATIAL KEY (location)` |

## Foreign Key Actions

| Attribute | Description | Example |
|-----------|-------------|---------|
| `ON DELETE CASCADE` | Delete child when parent deleted | `ON DELETE CASCADE` |
| `ON DELETE SET NULL` | Set to NULL when parent deleted | `ON DELETE SET NULL` |
| `ON DELETE RESTRICT` | Prevent parent deletion | `ON DELETE RESTRICT` |
| `ON DELETE NO ACTION` | Similar to RESTRICT | `ON DELETE NO ACTION` |
| `ON DELETE SET DEFAULT` | Set to default value | `ON DELETE SET DEFAULT` |
| `ON UPDATE CASCADE` | Update child when parent updated | `ON UPDATE CASCADE` |
| `ON UPDATE SET NULL` | Set to NULL when parent updated | `ON UPDATE SET NULL` |
| `ON UPDATE RESTRICT` | Prevent parent update | `ON UPDATE RESTRICT` |

## Generated Columns

| Attribute | Description | Example |
|-----------|-------------|---------|
| `GENERATED ALWAYS AS (expr) VIRTUAL` | Computed when queried | `full_price DECIMAL(10,2) GENERATED ALWAYS AS (price * (1 + tax_rate)) VIRTUAL` |
| `GENERATED ALWAYS AS (expr) STORED` | Computed and stored | `full_price DECIMAL(10,2) GENERATED ALWAYS AS (price * (1 + tax_rate)) STORED` |

## Character Set & Collation

| Attribute | Description | Example |
|-----------|-------------|---------|
| `CHARACTER SET charset` | Define character set | `name VARCHAR(100) CHARACTER SET utf8mb4` |
| `COLLATE collation` | Define collation | `name VARCHAR(100) COLLATE utf8mb4_unicode_ci` |

## Combined Example

```sql
CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL CHARACTER SET utf8mb4,
  sku VARCHAR(50) UNIQUE NOT NULL,
  price DECIMAL(10,2) NOT NULL CHECK (price > 0),
  discount_price DECIMAL(10,2) GENERATED ALWAYS AS (price * 0.9) STORED,
  category_id INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  description TEXT NULL COMMENT 'Product full description',
  INDEX (name),
  FULLTEXT KEY (description),
  FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1000;
```
```sql
CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL ,
  sku VARCHAR(50) UNIQUE NOT NULL,
  price DECIMAL(10,2) NOT NULL CHECK (price > 0),
  discount_price DECIMAL(10,2) GENERATED ALWAYS AS (price * 0.9) STORED,
  category_id INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  description TEXT NULL COMMENT 'Product full description',
  INDEX (name),
  FULLTEXT KEY (description)  
) ENGINE=InnoDB AUTO_INCREMENT=1000;
```