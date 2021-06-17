class Tabels {
  init(connection) {
    this.connection = connection

    this.createSellers()
    this.createProducts()
    this.createClients()
    this.createOrders()
    this.createCampaigns()
  }

  createSellers() {
    const sql = 'CREATE TABLE IF NOT EXISTS Sellers (id int NOT NULL AUTO_INCREMENT, name varchar(50) NOT NULL, totalAmmount int, address JSON,sellerComission int NOT NULL, shipping varchar(50), status varchar(20), creationDate datetime NOT NULL, description text, admin BOOLEAN NOT NULL, PRIMARY KEY(id))'

    this.connection.query(sql, err => {
      if (err) {
        console.log(err)
      } else {
        console.log('Tabel Sellers successful created!')
      }
    })
  }

  createProducts() {
    const sql = 'CREATE TABLE IF NOT EXISTS Products (id int NOT NULL AUTO_INCREMENT,alcohool int, name varchar(50) NOT NULL, price double NOT NULL, status varchar(20), description text,fullDescription text, productUrl varchar(50), category varchar(20), creationDate datetime NOT NULL, image varchar(150), stock int NOT NULL, dimensions JSON NOT NULL, PRIMARY KEY(ID), sellerId int, FOREIGN KEY (sellerId) REFERENCES Sellers(id))'

    this.connection.query(sql, err => {
      if (err) {
        console.log(err);
      } else {
        console.log('Tabel Products successful created!');
      }
    })

  }
  createClients() {
    const sql = 'CREATE TABLE IF NOT EXISTS Clients (clientId int NOT NULL AUTO_INCREMENT, fname varchar(15) NOT NULL, creationDate datetime NOT NULL,lname varchar(15) NOT NULL, email varchar(30) NOT NULL, password varchar(20) NOT NULL, CPF varchar(11),  status varchar(20), address JSON NOT NULL, activeOrders int NOT NULL, PRIMARY KEY(clientId))'

    this.connection.query(sql, err => {
      if (err) {
        console.log(err);
      }else{
        console.log("Tabel Clients successfull created!");
      }
    })
  }

  createOrders() {
    const sql = 'CREATE TABLE IF NOT EXISTS Orders (orderId int NOT NULL AUTO_INCREMENT,clientId int NOT NULL, clientFirstName varchar(30) NOT NULL, clientLastName varchar(30) NOT NULL, clientEmail varchar(30) NOT NULL, clientCPF varchar(11) NOT NULL, status varchar(10) NOT NULL, items JSON NOT NULL, creationDate datetime NOT NULL,clientAddress JSON NOT NULL, PRIMARY KEY(orderId), FOREIGN KEY(clientId) REFERENCES Clients(clientId))'

    this.connection.query(sql, err => {
      if(err) {
        console.log(err);
      }else{
        console.log("Tabel Orders successfull created!");
      }
    })
  }

  createCampaigns() {
    const sql = 'CREATE TABLE IF NOT EXISTS Campaigns (primary key(campaignId),campaignId int NOT NULL AUTO_INCREMENT, items JSON NOT NULL, name varchar(50))'

    this.connection.query(sql, err => {
      if(err) {
        console.log(err);
      }else{
        console.log("Tabel Campaigns succesfull created!");
      }
    })
  }

}

module.exports = new Tabels
