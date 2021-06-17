const query = require('../infra/database/queries')

class Product {
  add(product) {
    product.dimensions = JSON.stringify(product.dimensions)
    const sql = `INSERT INTO Products SET ?; UPDATE Sellers INNER JOIN Products ON Sellers.id = Products.sellerId SET Sellers.totalAmmount = Sellers.totalAmmount + 1 WHERE Sellers.id=${product.sellerId};`
    return query(sql, product)
  }

  findOne(id) {
    const sql = 'SELECT * FROM Products WHERE id=?'
    return query(sql, id)
  }

  findByName(product) {
    const sql = `SELECT * FROM Products WHERE name LIKE "%${product}%"`
    return query(sql, product)
  }

  delete(id) {
    const sql = 'DELETE FROM Products WHERE id= ?'
    return query(sql, id)
  }

  listAll() {
    const sql = 'SELECT * FROM Products'
    return query(sql)
  }

  update(product, id) {
    product.dimensions = JSON.stringify(product.dimensions)
    const sql = 'UPDATE Products SET ? WHERE id=?'
    return query(sql, [product, id])
  }
}

module.exports = new Product()
