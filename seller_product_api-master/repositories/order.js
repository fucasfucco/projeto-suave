const query = require('../infra/database/queries')

class Order {
  add(order) {
    order.items = JSON.stringify(order.items)
    order.clientAddress = JSON.stringify(order.clientAddress)
    const sql = `INSERT INTO Orders SET ?;
    SELECT LAST_INSERT_ID();
    UPDATE Orders INNER JOIN Clients ON Orders.clientId = Clients.clientId SET Clients.activeOrders = Clients.activeOrders + 1 WHERE Orders.clientId=${order.clientId};`
    return query(sql, order)
  }

  burnStock(id) {
    const sql = `UPDATE Products SET stock = stock -1 WHERE id=?`
    return query(sql, id)
  }

  cancelProducts(id) {
    const sql = `UPDATE Products SET stock = stock +1 WHERE id=?`
    return query(sql, id)
  }

  delete(id) {
    const sql = 'DELETE FROM Orders WHERE orderId=?'
    return query(sql, id)
  }

  findOne(id) {
    const sql = 'SELECT * FROM Orders WHERE orderId=?'
    return query(sql,id)
  }

  listAll() {
    const sql = 'SELECT * FROM Orders'
    return query(sql)
  }

  update(order, id) {
    order.items = JSON.stringify(order.items)
    order.clientAddress = JSON.stringify(order.clientAddress)
    const sql = 'UPDATE Orders SET ? WHERE orderId=?'
    return query(sql, [order, id])
  }
}

module.exports = new Order()
