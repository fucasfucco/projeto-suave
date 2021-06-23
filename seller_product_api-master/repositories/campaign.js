const query = require('../infra/database/queries')

class Campaign {
  add(newCampaign) {
    const name = newCampaign.name
    let items = newCampaign.items
    items = JSON.stringify(items);
    const sql = `INSERT INTO Campaigns (items, name) VALUES('${items}', '${name}')`
    return query(sql, newCampaign)
  }
  listAll() {
    const sql = 'SELECT * FROM Campaigns'
    return query(sql)
  }

  update(update, id) {
    update.items = JSON.stringify(update.items)
    console.log(update.items);
    const sql = `UPDATE Campaigns SET name = '${update.name}', items = '${update.items}' WHERE campaignId = ${id}`
    return query(sql, [update, id])
  }

  findOne(id) {
    const sql = 'SELECT * FROM Campaigns WHERE campaignId = ?'
    return query(sql, id)
  }

  delete(id){
    const sql = 'DELETE FROM Campaigns WHERE campaignId = ?'
    return query(sql, id)
  }

}

module.exports = new Campaign()
