const query = require('../infra/database/queries')

class Client {
  add(client) {
    client.address = JSON.stringify(client.address)
    const sql = `INSERT INTO Clients SET ?`
    return query(sql, client)
  }

  listAll(){
    const sql = 'SELECT * FROM Clients'
    return query(sql)
  }

  findOne(id){
    const sql = 'SELECT * FROM Clients WHERE clientId=?'
    return query(sql, id)
  }

  update(client, id) {
    client.address = JSON.stringify(client.address)
    const sql = 'UPDATE Clients SET ? WHERE clientId=?'
    return query(sql, [client, id])
  }

  delete(id) {
    const sql = 'DELETE FROM Clients WHERE clientId=?'
    return query(sql, id)
  }

}

module.exports = new Client()
