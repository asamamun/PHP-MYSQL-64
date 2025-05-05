<?php

class OpenSSLCrypto {
    private $key;
    private $algorithm;

    public function __construct($key, $algorithm) {
        $this->key = $key;
        $this->algorithm = $algorithm;
    }

    public function encrypt($data) {
        try {
            // Generate an initialization vector
            $ivLength = openssl_cipher_iv_length($this->algorithm);
            $iv = openssl_random_pseudo_bytes($ivLength);
            
            // Encrypt the data
            $encrypted = openssl_encrypt(
                $data,
                $this->algorithm,
                $this->key,
                0,
                $iv
            );

            if ($encrypted === false) {
                throw new Exception("Encryption failed: " . openssl_error_string());
            }

            // Combine IV and encrypted data
            $encryptedData = base64_encode($iv . $encrypted);
            return $encryptedData;
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function decrypt($encryptedData) {
        try {
            // Decode the base64 encoded data
            $data = base64_decode($encryptedData);
            if ($data === false) {
                throw new Exception("Base64 decoding failed");
            }

            // Extract IV and encrypted data
            $ivLength = openssl_cipher_iv_length($this->algorithm);
            $iv = substr($data, 0, $ivLength);
            $encrypted = substr($data, $ivLength);

            // Decrypt the data
            $decrypted = openssl_decrypt(
                $encrypted,
                $this->algorithm,
                $this->key,
                0,
                $iv
            );

            if ($decrypted === false) {
                throw new Exception("Decryption failed: " . openssl_error_string());
            }

            return $decrypted;
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}

// Example usage
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $key = $_POST['key'] ?? '';
    $data = $_POST['data'] ?? '';
    $algorithm = $_POST['algorithm'] ?? 'AES-256-CBC';
    $action = $_POST['action'] ?? '';

    // Validate inputs
    if (empty($key) || empty($data) || empty($algorithm)) {
        echo "Please provide key, data, and algorithm";
        exit;
    }

    $crypto = new OpenSSLCrypto($key, $algorithm);

    if ($action === 'encrypt') {
        $result = $crypto->encrypt($data);
        echo "Encrypted:<p> " . $result . "</p>";
    } elseif ($action === 'decrypt') {
        $result = $crypto->decrypt($data);
        echo "Decrypted:<p> " . $result . "</p>";
    } else {
        echo "Invalid action";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>OpenSSL Encryption/Decryption</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input, select, textarea { width: 100%; padding: 8px; margin-bottom: 10px; }
        button { padding: 10px 20px; background: #007bff; color: white; border: none; cursor: pointer; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>
    <h2>OpenSSL Encryption/Decryption</h2>
    <form method="post">
        <div class="form-group">
            <label for="key">Encryption Key:</label>
            <input type="text" name="key" id="key" required>
        </div>
        
        <div class="form-group">
            <label for="algorithm">Algorithm:</label>
            <select name="algorithm" id="algorithm">
                <option value="AES-256-CBC">AES-256-CBC</option>
                <option value="AES-192-CBC">AES-192-CBC</option>
                <option value="AES-128-CBC">AES-128-CBC</option>
                <option value="DES-CBC">DES-CBC</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="data">Data:</label>
            <textarea name="data" id="data" rows="4" required></textarea>
        </div>
        
        <div class="form-group">
            <button type="submit" name="action" value="encrypt">Encrypt</button>
            <button type="submit" name="action" value="decrypt">Decrypt</button>
        </div>
    </form>
</body>
</html>