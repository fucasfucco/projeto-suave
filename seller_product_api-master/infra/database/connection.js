const mysql = require('mysql')

const connection = mysql.createConnection({
    host: 'localhost',
    port: 3307,
    user: 'root',
    password: 'admin',
    database: 'seller',
    multipleStatements: true
})

module.exports = connection
