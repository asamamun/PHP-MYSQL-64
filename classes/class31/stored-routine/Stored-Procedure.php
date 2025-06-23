<pre>
create procedure create_user(in n varchar(50), in e varchar(50),in ph varchar(50), in pw varchar(256))
begin
insert into users(name,email,phone,password) values(n,e,ph,pw);
insert into categories(name,icon) values(md5(rand()),'rand');
end //
</pre>
<br>
call create_user('John Doe', 'Tb1bH@example.com', '1234567890', 'password');

<br>
<pre>
DELIMITER //

CREATE PROCEDURE InsertProduct (
    IN p_name VARCHAR(255),
    IN p_description TEXT,
    IN p_price DECIMAL(10,2),
    IN p_quantity INT,
    IN p_category_id INT,
    IN p_images VARCHAR(512)
)
BEGIN
    INSERT INTO products (
        name,
        description,
        price,
        quantity,
        category_id,
        images,
        created_at,
        updated_at
    )
    VALUES (
        p_name,
        p_description,
        p_price,
        p_quantity,
        p_category_id,
        p_images,
        NOW(),
        NOW()
    );
END //

DELIMITER ;
</pre>




