const query = require('../infra/database/queries')

class Campaign {
  add(newCampaign) {
    newCampaign = JSON.stringify(newCampaign);
    console.log(newCampaign);
    const sql = `INSERT INTO Campaigns (items) VALUES('${newCampaign}')`
    return query(sql, newCampaign)
  }
  listAll() {
    const sql = 'SELECT * FROM Campaigns'
    return query(sql)
  }

  findOne(id) {
    const sql = 'SELECT * FROM Campaigns WHERE campaignId = ?'
    return query(sql, id)
  }

  update(seller, id) {
    seller.address = JSON.stringify(seller.address)
    const sql = 'UPDATE Campaigns SET ? WHERE campaignId = ?'
    return query(sql, [seller, id])
  }

  delete(id){
    const sql = 'DELETE FROM Campaigns WHERE campaignId = ?'
    return query(sql, id)
  }

}

module.exports = new Campaign()
