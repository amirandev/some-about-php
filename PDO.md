 ## PHP PDO Documentation

### Connecting to a Database

To establish a connection to a database using PDO, use the following code:

```php
$dsn = 'mysql:host=localhost;dbname=mydatabase;charset=utf8mb4';
$username = 'your_username';
$password = 'your_password';

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
```

### CRUD Operations

**1. Inserting Data**

To insert data into a table, you can use prepared statements with placeholders:

```php
$name = 'John Doe';
$email = 'john@example.com';

$stmt = $pdo->prepare('INSERT INTO users (name, email) VALUES (?, ?)');
$stmt->execute([$name, $email]);

$newUserId = $pdo->lastInsertId();
```

**2. Selecting Data**

To select data from a table, you can use prepared statements and fetch the results:

```php
$stmt = $pdo->prepare('SELECT * FROM users');
$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user) {
    echo $user['name'] . ' - ' . $user['email'] . '<br>';
}
```

**3. Updating Data**

To update data in a table, use prepared statements with placeholders:

```php
$id = 1;
$email = 'john.doe@example.com';

$stmt = $pdo->prepare('UPDATE users SET email = ? WHERE id = ?');
$stmt->execute([$email, $id]);

$affectedRows = $stmt->rowCount();
```

**4. Deleting Data**

To delete data from a table, use prepared statements with placeholders:

```php
$id = 1;

$stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
$stmt->execute([$id]);

$affectedRows = $stmt->rowCount();
```

### Prepared Statements and Bindings

Prepared statements provide a secure way to execute SQL queries with parameter bindings. It helps prevent SQL injection attacks. Here's an example of using named placeholders:

```php
$name = 'John Doe';

$stmt = $pdo->prepare('SELECT * FROM users WHERE name = :name');
$stmt->execute(['name' => $name]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

echo $user['name'] . ' - ' . $user['email'];
```

### Fetching Results

PDO provides different methods for fetching results from a query:

**1. `fetch()`:** Fetches the next row from a result set as an associative array, an object, or both.

```php
$stmt = $pdo->query('SELECT * FROM users');

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['name'] . ' - ' . $row['email'] . '<br>';
}
```

**2. `fetchColumn()`:** Fetches a single column from the next row of a result set.

```php
$stmt = $pdo->query('SELECT name FROM users');
$name = $stmt->fetchColumn();

echo $name;
```

**3. `fetchAll()`:** Fetches all rows from a result set as an associative array, an object, or both.

```php
$stmt = $pdo->query('SELECT * FROM users');
$users = $stmt->fetchAll(PDO::FETCH_OBJ);

foreach ($users as $user) {
    echo $user->name . ' - ' . $user->email .

 '<br>';
}
```

### Pagination

To implement pagination in your queries, you can use the `LIMIT` clause. Here's an example:

```php
$page = 1; // Current page
$perPage = 10; // Records per page

$offset = ($page - 1) * $perPage;

$stmt = $pdo->prepare('SELECT * FROM users LIMIT :offset, :perPage');
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->bindParam(':perPage', $perPage, PDO::PARAM_INT);
$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user) {
    echo $user['name'] . ' - ' . $user['email'] . '<br>';
}
```

In this example, `$page` represents the current page, and `$perPage` represents the number of records to display per page. The `LIMIT` clause limits the result set to the specified offset and number of records.

This documentation co
