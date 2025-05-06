<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL/MariaDB Data Types: Complete Reference</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1 {
            color: #0066cc;
            text-align: center;
            border-bottom: 2px solid #0066cc;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        h2 {
            color: #0066cc;
            margin-top: 30px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }
        h3 {
            color: #0066cc;
        }
        .data-type-category {
            margin-bottom: 40px;
            padding: 15px;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .data-type {
            background-color: #f0f8ff;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border-left: 4px solid #0066cc;
        }
        .syntax {
            background-color: #f5f5f5;
            padding: 10px;
            margin: 10px 0;
            border-radius: 3px;
            font-family: monospace;
            border-left: 3px solid #666;
        }
        .attributes {
            background-color: #fff9e6;
            padding: 10px;
            margin: 10px 0;
            border-radius: 3px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .note {
            background-color: #e6f7ff;
            padding: 10px;
            border-radius: 5px;
            border-left: 4px solid #1890ff;
            margin: 10px 0;
        }
        .differences {
            background-color: #e6ffe6;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>MySQL/MariaDB Data Types: Complete Reference</h1>
    
    <div class="data-type-category">
        <h2>Integer Types</h2>
        <p>Integer data types store whole numbers without fractional components.</p>
        
        <div class="data-type">
            <h3>TINYINT</h3>
            <div class="syntax">TINYINT[(M)] [UNSIGNED] [ZEROFILL]</div>
            <p>A very small integer.</p>
            <table>
                <tr>
                    <th>Storage</th>
                    <th>Signed Range</th>
                    <th>Unsigned Range</th>
                </tr>
                <tr>
                    <td>1 byte</td>
                    <td>-128 to 127</td>
                    <td>0 to 255</td>
                </tr>
            </table>
        </div>
        
        <div class="data-type">
            <h3>SMALLINT</h3>
            <div class="syntax">SMALLINT[(M)] [UNSIGNED] [ZEROFILL]</div>
            <p>A small integer.</p>
            <table>
                <tr>
                    <th>Storage</th>
                    <th>Signed Range</th>
                    <th>Unsigned Range</th>
                </tr>
                <tr>
                    <td>2 bytes</td>
                    <td>-32,768 to 32,767</td>
                    <td>0 to 65,535</td>
                </tr>
            </table>
        </div>
        
        <div class="data-type">
            <h3>MEDIUMINT</h3>
            <div class="syntax">MEDIUMINT[(M)] [UNSIGNED] [ZEROFILL]</div>
            <p>A medium-sized integer.</p>
            <table>
                <tr>
                    <th>Storage</th>
                    <th>Signed Range</th>
                    <th>Unsigned Range</th>
                </tr>
                <tr>
                    <td>3 bytes</td>
                    <td>-8,388,608 to 8,388,607</td>
                    <td>0 to 16,777,215</td>
                </tr>
            </table>
        </div>
        
        <div class="data-type">
            <h3>INT / INTEGER</h3>
            <div class="syntax">INT[(M)] [UNSIGNED] [ZEROFILL]</div>
            <p>A standard integer. INT and INTEGER are synonyms.</p>
            <table>
                <tr>
                    <th>Storage</th>
                    <th>Signed Range</th>
                    <th>Unsigned Range</th>
                </tr>
                <tr>
                    <td>4 bytes</td>
                    <td>-2,147,483,648 to 2,147,483,647</td>
                    <td>0 to 4,294,967,295</td>
                </tr>
            </table>
        </div>
        
        <div class="data-type">
            <h3>BIGINT</h3>
            <div class="syntax">BIGINT[(M)] [UNSIGNED] [ZEROFILL]</div>
            <p>A large integer.</p>
            <table>
                <tr>
                    <th>Storage</th>
                    <th>Signed Range</th>
                    <th>Unsigned Range</th>
                </tr>
                <tr>
                    <td>8 bytes</td>
                    <td>-9,223,372,036,854,775,808 to 9,223,372,036,854,775,807</td>
                    <td>0 to 18,446,744,073,709,551,615</td>
                </tr>
            </table>
        </div>
        
        <div class="attributes">
            <h3>Integer Attributes</h3>
            <ul>
                <li><strong>M</strong>: Display width (doesn't constrain range). Deprecated in MySQL 8.0.17+.</li>
                <li><strong>UNSIGNED</strong>: Prevents negative values and doubles the upper range.</li>
                <li><strong>ZEROFILL</strong>: Pads displayed values with zeros to the width specified by M. Automatically adds UNSIGNED. Deprecated in MySQL 8.0.17+.</li>
                <li><strong>AUTO_INCREMENT</strong>: Automatically generates sequential unique values.</li>
            </ul>
        </div>
    </div>
    
    <div class="data-type-category">
        <h2>Fixed-Point Types</h2>
        <p>Fixed-point types store exact numeric data values with a fixed precision and scale.</p>
        
        <div class="data-type">
            <h3>DECIMAL / NUMERIC</h3>
            <div class="syntax">DECIMAL[(M[,D])] [UNSIGNED] [ZEROFILL]</div>
            <p>Exact fixed-point number. DECIMAL and NUMERIC are synonyms.</p>
            <table>
                <tr>
                    <th>Parameters</th>
                    <th>Range</th>
                    <th>Storage</th>
                </tr>
                <tr>
                    <td>M: 1 to 65 (precision)<br>D: 0 to 30 and ≤ M (scale)</td>
                    <td>Depends on M and D values</td>
                    <td>Variable: Approximately M+2 bytes</td>
                </tr>
            </table>
            <p>Default values if not specified: M=10, D=0.</p>
        </div>
    </div>
    
    <div class="data-type-category">
        <h2>Floating-Point Types</h2>
        <p>Floating-point types store approximate numeric data values.</p>
        
        <div class="data-type">
            <h3>FLOAT</h3>
            <div class="syntax">FLOAT[(M,D)] [UNSIGNED] [ZEROFILL]</div>
            <p>Single-precision floating-point number.</p>
            <table>
                <tr>
                    <th>Storage</th>
                    <th>Range</th>
                    <th>Precision</th>
                </tr>
                <tr>
                    <td>4 bytes</td>
                    <td>±1.175494351E-38 to ±3.402823466E+38</td>
                    <td>~7 decimal digits</td>
                </tr>
            </table>
        </div>
        
        <div class="data-type">
            <h3>DOUBLE / DOUBLE PRECISION / REAL</h3>
            <div class="syntax">DOUBLE[(M,D)] [UNSIGNED] [ZEROFILL]</div>
            <p>Double-precision floating-point number. DOUBLE, DOUBLE PRECISION, and REAL are synonyms.</p>
            <table>
                <tr>
                    <th>Storage</th>
                    <th>Range</th>
                    <th>Precision</th>
                </tr>
                <tr>
                    <td>8 bytes</td>
                    <td>±2.2250738585072014E-308 to ±1.7976931348623157E+308</td>
                    <td>~15 decimal digits</td>
                </tr>
            </table>
        </div>
        
        <div class="note">
            <p><strong>Note:</strong> M (total digits) and D (decimal places) are deprecated for FLOAT and DOUBLE in MySQL 8.0.17+.</p>
        </div>
    </div>
    
    <div class="data-type-category">
        <h2>String Types</h2>
        <p>String data types store character and binary data.</p>
        
        <div class="data-type">
            <h3>CHAR</h3>
            <div class="syntax">CHAR[(M)] [CHARACTER SET charset_name] [COLLATE collation_name]</div>
            <p>Fixed-length string that is always padded right with spaces to the specified length when stored.</p>
            <table>
                <tr>
                    <th>Length Range</th>
                    <th>Storage</th>
                </tr>
                <tr>
                    <td>0 to 255 characters</td>
                    <td>M × charset byte length</td>
                </tr>
            </table>
            <p>Default length if not specified: 1.</p>
        </div>
        
        <div class="data-type">
            <h3>VARCHAR</h3>
            <div class="syntax">VARCHAR(M) [CHARACTER SET charset_name] [COLLATE collation_name]</div>
            <p>Variable-length string.</p>
            <table>
                <tr>
                    <th>Length Range</th>
                    <th>Storage</th>
                </tr>
                <tr>
                    <td>1 to 65,535 characters</td>
                    <td>Length prefix (1-2 bytes) + actual data</td>
                </tr>
            </table>
            <p>Effective maximum length depends on maximum row size (65,535 bytes) and character set.</p>
        </div>
        
        <div class="data-type">
            <h3>BINARY</h3>
            <div class="syntax">BINARY[(M)]</div>
            <p>Fixed-length binary string. Similar to CHAR but stores binary byte strings.</p>
            <table>
                <tr>
                    <th>Length Range</th>
                    <th>Storage</th>
                </tr>
                <tr>
                    <td>0 to 255 bytes</td>
                    <td>M bytes</td>
                </tr>
            </table>
            <p>Padded with 0x00 (null bytes) to the specified length.</p>
        </div>
        
        <div class="data-type">
            <h3>VARBINARY</h3>
            <div class="syntax">VARBINARY(M)</div>
            <p>Variable-length binary string. Similar to VARCHAR but stores binary byte strings.</p>
            <table>
                <tr>
                    <th>Length Range</th>
                    <th>Storage</th>
                </tr>
                <tr>
                    <td>1 to 65,535 bytes</td>
                    <td>Length prefix (1-2 bytes) + actual data</td>
                </tr>
            </table>
        </div>
        
        <div class="data-type">
            <h3>TINYTEXT</h3>
            <div class="syntax">TINYTEXT [CHARACTER SET charset_name] [COLLATE collation_name]</div>
            <p>A small TEXT column.</p>
            <table>
                <tr>
                    <th>Maximum Length</th>
                    <th>Storage</th>
                </tr>
                <tr>
                    <td>255 (2^8-1) characters</td>
                    <td>Length prefix (1 byte) + actual data</td>
                </tr>
            </table>
        </div>
        
        <div class="data-type">
            <h3>TEXT</h3>
            <div class="syntax">TEXT [CHARACTER SET charset_name] [COLLATE collation_name]</div>
            <p>Medium-sized TEXT column.</p>
            <table>
                <tr>
                    <th>Maximum Length</th>
                    <th>Storage</th>
                </tr>
                <tr>
                    <td>65,535 (2^16-1) characters</td>
                    <td>Length prefix (2 bytes) + actual data</td>
                </tr>
            </table>
        </div>
        
        <div class="data-type">
            <h3>MEDIUMTEXT</h3>
            <div class="syntax">MEDIUMTEXT [CHARACTER SET charset_name] [COLLATE collation_name]</div>
            <p>Medium-large TEXT column.</p>
            <table>
                <tr>
                    <th>Maximum Length</th>
                    <th>Storage</th>
                </tr>
                <tr>
                    <td>16,777,215 (2^24-1) characters</td>
                    <td>Length prefix (3 bytes) + actual data</td>
                </tr>
            </table>
        </div>
        
        <div class="data-type">
            <h3>LONGTEXT</h3>
            <div class="syntax">LONGTEXT [CHARACTER SET charset_name] [COLLATE collation_name]</div>
            <p>Large TEXT column.</p>
            <table>
                <tr>
                    <th>Maximum Length</th>
                    <th>Storage</th>
                </tr>
                <tr>
                    <td>4,294,967,295 (2^32-1) characters</td>
                    <td>Length prefix (4 bytes) + actual data</td>
                </tr>
            </table>
        </div>
        
        <div class="data-type">
            <h3>TINYBLOB</h3>
            <div class="syntax">TINYBLOB</div>
            <p>A small BLOB (Binary Large Object) column.</p>
            <table>
                <tr>
                    <th>Maximum Length</th>
                    <th>Storage</th>
                </tr>
                <tr>
                    <td>255 (2^8-1) bytes</td>
                    <td>Length prefix (1 byte) + actual data</td>
                </tr>
            </table>
        </div>
        
        <div class="data-type">
            <h3>BLOB</h3>
            <div class="syntax">BLOB</div>
            <p>Medium-sized BLOB column.</p>
            <table>
                <tr>
                    <th>Maximum Length</th>
                    <th>Storage</th>
                </tr>
                <tr>
                    <td>65,535 (2^16-1) bytes</td>
                    <td>Length prefix (2 bytes) + actual data</td>
                </tr>
            </table>
        </div>
        
        <div class="data-type">
            <h3>MEDIUMBLOB</h3>
            <div class="syntax">MEDIUMBLOB</div>
            <p>Medium-large BLOB column.</p>
            <table>
                <tr>
                    <th>Maximum Length</th>
                    <th>Storage</th>
                </tr>
                <tr>
                    <td>16,777,215 (2^24-1) bytes</td>
                    <td>Length prefix (3 bytes) + actual data</td>
                </tr>
            </table>
        </div>
        
        <div class="data-type">
            <h3>LONGBLOB</h3>
            <div class="syntax">LONGBLOB</div>
            <p>Large BLOB column.</p>
            <table>
                <tr>
                    <th>Maximum Length</th>
                    <th>Storage</th>
                </tr>
                <tr>
                    <td>4,294,967,295 (2^32-1) bytes</td>
                    <td>Length prefix (4 bytes) + actual data</td>
                </tr>
            </table>
        </div>
        
        <div class="note">
            <p><strong>Note:</strong> TEXT types store character data and are subject to character set encoding rules. BLOB types store binary data with no character set or collation.</p>
        </div>
    </div>
    
    <div class="data-type-category">
        <h2>Enumeration Types</h2>
        <p>Enumeration data types allow selection from a list of permitted values.</p>
        
        <div class="data-type">
            <h3>ENUM</h3>
            <div class="syntax">ENUM('value1','value2',...) [CHARACTER SET charset_name] [COLLATE collation_name]</div>
            <p>A string object that can have only one value, chosen from a list of values defined at table creation time.</p>
            <table>
                <tr>
                    <th>Maximum Values</th>
                    <th>Storage</th>
                </tr>
                <tr>
                    <td>65,535 distinct values</td>
                    <td>1 byte (for lists up to 255 values)<br>2 bytes (for lists with more than 255 values)</td>
                </tr>
            </table>
            <p>Each ENUM value is assigned an index: 1 for the first element, 2 for the second, etc. The index 0 is reserved for the error value (empty string).</p>
        </div>
        
        <div class="data-type">
            <h3>SET</h3>
            <div class="syntax">SET('value1','value2',...) [CHARACTER SET charset_name] [COLLATE collation_name]</div>
            <p>A string object that can have zero or more values, chosen from a list of values defined at table creation time.</p>
            <table>
                <tr>
                    <th>Maximum Values</th>
                    <th>Storage</th>
                </tr>
                <tr>
                    <td>64 distinct members</td>
                    <td>1, 2, 3, 4, or 8 bytes, depending on the number of set members</td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="data-type-category">
        <h2>Date and Time Types</h2>
        <p>Date and time data types store temporal values.</p>
        
        <div class="data-type">
            <h3>DATE</h3>
            <div class="syntax">DATE</div>
            <p>A date value in 'YYYY-MM-DD' format.</p>
            <table>
                <tr>
                    <th>Range</th>
                    <th>Storage</th>
                    <th>Format</th>
                </tr>
                <tr>
                    <td>'1000-01-01' to '9999-12-31'</td>
                    <td>3 bytes</td>
                    <td>'YYYY-MM-DD'</td>
                </tr>
            </table>
        </div>
        
        <div class="data-type">
            <h3>TIME</h3>
            <div class="syntax">TIME[(fsp)]</div>
            <p>A time value in 'HH:MM:SS[.fraction]' format.</p>
            <table>
                <tr>
                    <th>Range</th>
                    <th>Storage</th>
                    <th>Format</th>
                </tr>
                <tr>
                    <td>'-838:59:59.000000' to '838:59:59.000000'</td>
                    <td>3 bytes + 0-3 bytes for fractional seconds</td>
                    <td>'HH:MM:SS[.fraction]'</td>
                </tr>
            </table>
            <p>fsp: fractional seconds precision (0-6, default 0)</p>
        </div>
        
        <div class="data-type">
            <h3>DATETIME</h3>
            <div class="syntax">DATETIME[(fsp)]</div>
            <p>A date and time combination in 'YYYY-MM-DD HH:MM:SS[.fraction]' format.</p>
            <table>
                <tr>
                    <th>Range</th>
                    <th>Storage</th>
                    <th>Format</th>
                </tr>
                <tr>
                    <td>'1000-01-01 00:00:00.000000' to '9999-12-31 23:59:59.999999'</td>
                    <td>5 bytes + 0-3 bytes for fractional seconds</td>
                    <td>'YYYY-MM-DD HH:MM:SS[.fraction]'</td>
                </tr>
            </table>
            <p>fsp: fractional seconds precision (0-6, default 0)</p>
        </div>
        
        <div class="data-type">
            <h3>TIMESTAMP</h3>
            <div class="syntax">TIMESTAMP[(fsp)]</div>
            <p>A timestamp value, stored as the number of seconds since the Unix epoch ('1970-01-01 00:00:00' UTC).</p>
            <table>
                <tr>
                    <th>Range</th>
                    <th>Storage</th>
                    <th>Format</th>
                </tr>
                <tr>
                    <td>'1970-01-01 00:00:01.000000' UTC to '2038-01-19 03:14:07.999999' UTC</td>
                    <td>4 bytes + 0-3 bytes for fractional seconds</td>
                    <td>'YYYY-MM-DD HH:MM:SS[.fraction]'</td>
                </tr>
            </table>
            <p>fsp: fractional seconds precision (0-6, default 0)</p>
            <div class="note">
                <p><strong>Note:</strong> TIMESTAMP values are converted from the current time zone to UTC for storage, and converted back from UTC to the current time zone for retrieval.</p>
            </div>
        </div>
        
        <div class="data-type">
            <h3>YEAR</h3>
            <div class="syntax">YEAR[(4)]</div>
            <p>A year value in 4-digit format.</p>
            <table>
                <tr>
                    <th>Range</th>
                    <th>Storage</th>
                    <th>Format</th>
                </tr>
                <tr>
                    <td>1901 to 2155, and 0000</td>
                    <td>1 byte</td>
                    <td>YYYY</td>
                </tr>
            </table>
            <p>As of MySQL 5.7.5, YEAR(2) is no longer supported.</p>
        </div>
        
        <div class="differences">
            <h3>DATETIME vs TIMESTAMP</h3>
            <table>
                <tr>
                    <th>Feature</th>
                    <th>DATETIME</th>
                    <th>TIMESTAMP</th>
                </tr>
                <tr>
                    <td>Range</td>
                    <td>1000-01-01 to 9999-12-31</td>
                    <td>1970-01-01 to 2038-01-19</td>
                </tr>
                <tr>
                    <td>Storage</td>
                    <td>5-8 bytes</td>
                    <td>4-7 bytes</td>
                </tr>
                <tr>
                    <td>Time Zone</td>
                    <td>Not affected by time zone</td>
                    <td>Converts to UTC for storage</td>
                </tr>
                <tr>
                    <td>Default Value</td>
                    <td>NULL unless NOT NULL</td>
                    <td>CURRENT_TIMESTAMP for first in table</td>
                </tr>
                <tr>
                    <td>Auto Update</td>
                    <td>Only if specified</td>
                    <td>Can be auto-updated on row change</td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="data-type-category">
        <h2>JSON Type</h2>
        <p>Available in MySQL 5.7.8+ and MariaDB 10.2.7+</p>
        
        <div class="data-type">
            <h3>JSON</h3>
            <div class="syntax">JSON</div>
            <p>Stores JSON (JavaScript Object Notation) documents.</p>
            <table>
                <tr>
                    <th>Storage</th>
                    <th>Maximum Size</th>
                </tr>
                <tr>
                    <td>Binary format, variable length</td>
                    <td>Same as LONGBLOB (4GB)</td>
                </tr>
            </table>
            <p>Provides automatic validation of JSON documents and optimized storage format.</p>
            <div class="note">
                <p><strong>Note:</strong> In MariaDB, JSON is an alias for LONGTEXT with a check constraint ensuring the content is valid JSON.</p>
            </div>
        </div>
    </div>
    
    <div class="data-type-category">
        <h2>Spatial Data Types</h2>
        <p>Spatial data types are used to represent geographic features.</p>
        
        <div class="data-type">
            <h3>GEOMETRY</h3>
            <div class="syntax">GEOMETRY</div>
            <p>Can store any type of spatial value (abstract superclass).</p>
        </div>
        
        <div class="data-type">
            <h3>POINT</h3>
            <div class="syntax">POINT</div>
            <p>A single location in coordinate space.</p>
        </div>
        
        <div class="data-type">
            <h3>LINESTRING</h3>
            <div class="syntax">LINESTRING</div>
            <p>A curve with linear interpolation between points.</p>
        </div>
        
        <div class="data-type">
            <h3>POLYGON</h3>
            <div class="syntax">POLYGON</div>
            <p>A polygon, possibly with holes.</p>
        </div>
        
        <div class="data-type">
            <h3>MULTIPOINT</h3>
            <div class="syntax">MULTIPOINT</div>
            <p>A collection of points.</p>
        </div>
        
        <div class="data-type">
            <h3>MULTILINESTRING</h3>
            <div class="syntax">MULTILINESTRING</div>
            <p>A collection of linestrings.</p>
        </div>
        
        <div class="data-type">
            <h3>MULTIPOLYGON</h3>
            <div class="syntax">MULTIPOLYGON</div>
            <p>A collection of polygons.</p>
        </div>
        
        <div class="data-type">
            <h3>GEOMETRYCOLLECTION</h3>
            <div class="syntax">GEOMETRYCOLLECTION</div>
            <p>A collection of geometry objects of any type.</p>
        </div>
        
        <div class="note">
            <p><strong>Note:</strong> Spatial data types store geometry values using the OpenGIS format. All spatial types have a fixed storage size of approximately 13 bytes plus the actual geometry data.</p>
        </div>
    </div>
    
    <div class="data-type-category">
        <h2>BIT Type</h2>
        <p>The BIT data type is used to store bit field values.</p>
        
        <div class="data-type">
            <h3>BIT</h3>
            <div class="syntax">BIT[(M)]</div>
            <p>A bit-field type where M represents the number of bits per value.</p>
            <table>
                <tr>
                    <th>M Range</th>
                    <th>Storage</th>
                </tr>
                <tr>
                    <td>1 to 64</td>
                    <td>Approximately (M+7)/8 bytes</td>
                </tr>
            </table>
            <p>Default M value if not specified: 1</p>
        </div>
    </div>
    
    <div class="data-type-category">
        <h2>Common Attributes and Modifiers</h2>
        <p>These attributes can be applied to many data types.</p>
        
        <div class="attributes">
            <ul>
                <li><strong>NOT NULL</strong>: Column cannot contain NULL values</li>
                <li><strong>NULL</strong>: Column can contain NULL values</li>
            </ul>
        </div>
    </div>
</body>
</html>