const query = require('../infra/database/queries')

class Seller {
  add(seller) {
    seller.address = JSON.stringify(seller.address);

    const sql = `INSERT INTO Sellers SET ?`
    return query(sql, seller)
  }
  listAll() {
    const sql = 'SELECT * FROM Sellers'
    return query(sql)
  }

  findOne(id) {
    const sql = 'SELECT * FROM Sellers WHERE id= ?'
    return query(sql, id)
  }

  admin(id) {
    const sql = 'UPDATE Sellers SET admin="1" WHERE ID= ?'
    return query(sql, id)
  }

  update(seller, id) {
    seller.address = JSON.stringify(seller.address)
    const sql = 'UPDATE Sellers SET ? WHERE id= ?'
    return query(sql, [seller, id])
  }

  delete(id){
    const sql = 'DELETE FROM Sellers WHERE id= ?'
    return query(sql, id)
  }

  findProducts(id) {
    const sql = `SELECT Products.* FROM Sellers INNER JOIN Products ON Sellers.id = Products.sellerId WHERE Sellers.id=${id}`
    return query(sql, id)
  }

}

module.exports = new Seller()
