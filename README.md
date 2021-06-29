![license](https://img.shields.io/static/v1?label=License&message=MIT&color=%3CCOLOR%3E&style=%3CSTYLE%3E&logo=%3CLOGO%3E)
![API](https://img.shields.io/badge/API%20E_commerce-v2.0-blue)
![Tests passing](https://img.shields.io/badge/test-passing-brightgreen)
![version](https://img.shields.io/badge/version-v2.0.0-orange)
# E-commerce.
```
E-commerce
Prototype of an mini e-comerce api.
```

## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

## Prerequisites
Node.js, Express, MySQL Nodemon, Postman and NPM (or other dependency manager of your choice).

***Installing***
```
npm install express
npm install nodemon
npm install consign
npm install mysql
npm install moment
npm install express
npm install cpf-cnpj-validator
npm install cypress
npm install cypress-cucumber-preprocessor
```

***-------------------------------------------------------------------------------------------------------------------------------------------------------------***

## Seller Postman curls.

**Create Seller**
```javascript
curl --location --request POST 'http://localhost:3000/sellers' \
--header 'Content-Type: application/json' \
--data-raw '{
   "name" : "sellerExample",
   "sellerComission" : 23.12,
   "shipping" : "sedex",
   "status" : "enabled",
   "description" : "this seller hasn t any description",
    "address": {
      "street": "João Provin",
      "district": "Ipiranga",
      "number": "562",
      "CEP": "99300-00",
      "city": "Soledade",
      "state": "Rio Grande do Sul"
    }
}'
```

**Find Seller by id**
```javascript
curl --location --request GET 'http://localhost:3000/seller/13'
```
**Update Seller**
```javascript
 curl --location --request PATCH 'http://localhost:3000/seller/3' \
--header 'Content-Type: application/json' \
--data-raw '{
   "name" : "sellerExamples",
   "sellerComission" : 23.12,
   "shipping" : "sedex",
   "status" : "enabled",
   "description" : "this seller hasn t any description",
    "address": {
      "street": "João Provin",
      "district": "Ipiranga",
      "number": "562",
      "CEP": "99300-00",
      "city": "Soledades",
      "state": "Rio Grande do Sul"
    }
}'
```
**Find all Sellers**
```javascript
curl --location --request GET 'http://localhost:3000/sellers'
```
**Find all Seller Products**
```javascript
curl --location --request GET 'http://localhost:3000/seller/products/2'
```
**Delete Seller**
```javascript
curl --location --request DELETE 'http://localhost:3000/seller/3'
```
**Admin Seller service**
```javascript
curl --location --request PUT 'http://localhost:3000/seller/admin/10' \
--header 'Content-Type: application/json' \
--data-raw '{
   "name" : "sellerExample",
   "sellerComission" : 23.12,
   "shipping" : "sedex",
   "status" : "enabled",
   "description" : "this seller hasn t any description"
}'
```

***-------------------------------------------------------------------------------------------------------------------------------------------------------------***

## Product curls.

**Create Product**
```javascript
curl --location --request POST 'http://localhost:3000/products' \
--header 'Content-Type: application/json' \
--data-raw '{
   "name" : "ProductExample",
   "sellerId" : 2,
   "price" : 59.10,
   "status" : "enabled",
   "description" : "this Product hasn t any description",
    "productUrl" : "www.product.com",
    "category" : "kitchen",
    "image" : "produtcs/images/productImg.png",
    "stock" : 88,
    "dimensions" : {
        "weight" : 55,
        "height" : 25,
        "width" : 10,
        "length" : 27
    }
}'
```

**Find Product by id**
```javascript
curl --location --request GET 'http://localhost:3000/product/6'
```

**Find all Products**
```javascript
curl --location --request GET 'http://localhost:3000/products'
```

**Delete product**
```javascript
curl --location --request DELETE 'http://localhost:3000/product/3'
```

**Update Product**
```javascript
curl --location --request PATCH 'http://localhost:3000/product/6' \
--header 'Content-Type: application/json' \
--data-raw '{
   "name" : "sellerExample",
   "price" : 59.10,
   "status" : "enabled",
   "description" : "this seller hasn t any description",
    "productUrl" : "www.product.com",
    "category" : "kitchen",
    "image" : "https://imgur.com/gallery/jW8TzRm",
    "stock" : 88,
    "dimensions" : {
        "weight" : 75,
        "height" : 85,
        "width" : 10,
        "length" : 27
    }
}'
```

***-------------------------------------------------------------------------------------------------------------------------------------------------------------***

## Client curls.

**Create Client**
```javascript
curl --location --request POST 'http://localhost:3000/clients' \
--header 'Content-Type: application/json' \
--data-raw '{
   "fname" : "Lucas",
   "lname" : "Gois da silva",
   "email" : "fucoieemc@gmail.com",
   "password" : "passwordWithHash",
   "CPF" : "04726806092",
   "status" : "enabled",
    "address": {
      "street": "João Provin",
      "district": "Ipiranga",
      "number": "562",
      "CEP": "99300-00",
      "city": "Soledade",
      "state": "Rio Grande do Sul"
    }
}'
```

**Find Client by id**
```javascript
curl --location --request GET 'http://localhost:3000/client/2'
```

**Update Client**
```javascript
curl --location --request PATCH 'http://localhost:3000/client/1' \
--header 'Content-Type: application/json' \
--data-raw '{
   "fname" : "atualizado",
   "lname" : "Gois da silva",
   "email" : "fucoieemc@gmail.com",
   "password" : "passwordWithHash",
   "CPF" : "04726806092",
   "status" : "enabled",
    "address": {
      "street": "João Provin",
      "district": "Ipiranga",
      "number": "562",
      "CEP": "99300-00",
      "city": "Soledade",
      "state": "Rio Grande do Sul"
    }
}'
```

**Find all Clients**
```javascript
curl --location --request GET 'http://localhost:3000/clients'
```

**Delete Client**
```javascript
curl --location --request DELETE 'http://localhost:3000/client/1'
```

***-------------------------------------------------------------------------------------------------------------------------------------------------------------***

## Order curls.

**Create Order**
```javascript
curl --location --request POST 'http://localhost:3000/orders' \
--header 'Content-Type: application/json' \
--data-raw '{
  "clientId" : 1,
  "clientFirstName": "Lucas",
  "clientLastName": "Gois da silva",
  "clientEmail": "fucoieemc@gmail.com",
  "clientCPF": "04726806092",
  "status": "enabled",
  "items": [
      {
    "productId" : 9,
    "productName": "pasta de dentess",
    "productPrice": 2.50,
    "productValidity": "2021-04-03T21:30:08",
    "productSeller": 13,
    "productStatus": "enabled",
    "productDescription": "nenhuma",
    "productCategory": "kitchen",
    "dimensions": {
      "weight": 55,
      "height": 25,
      "width": 10,
      "length": 27
    }
  },{
    "productId" : 5,
    "productName": "caneta",
    "productPrice": 2.54,
    "productValidity": "2021-04-03T21:30:08",
    "productSeller": 13,
    "productStatus": "enabled",
    "productDescription": "escreve",
    "productCategory": "escritorio",
    "dimensions": {
      "weight": 1,
      "height": 15,
      "width": 10,
      "length": 27
    }
  }
  ],
  "clientAddress" : {
      "street": "João Provin",
      "district": "Ipiranga",
      "number": "562",
      "CEP": "99300-00",
      "city": "Soledade",
      "state": "Rio Grande do Sul"
    }
}'
```

**Update Order**
```javascript
curl --location --request PATCH 'http://localhost:3000/order/1' \
--header 'Content-Type: application/json' \
--data-raw '{
  "clientId" : 1,
  "clientFirstName": "Lucasg",
  "clientLastName": "Gois da silva",
  "clientEmail": "fucoieemc@gmail.com",
  "clientCPF": "04726806092",
  "status": "enabled",
  "items": [
      {
    "productId" : 9,
    "productName": "pasta de dentess",
    "productPrice": 2.50,
    "productValidity": "2021-04-03T21:30:08",
    "productSeller": 13,
    "productStatus": "enabled",
    "productDescription": "nenhuma",
    "productCategory": "kitchen",
    "dimensions": {
      "weight": 55,
      "height": 25,
      "width": 10,
      "length": 27
    }
  },{
    "productId" : 5,
    "productName": "caneta",
    "productPrice": 2.54,
    "productValidity": "2021-04-03T21:30:08",
    "productSeller": 13,
    "productStatus": "enabled",
    "productDescription": "escreve",
    "productCategory": "escritorio",
    "dimensions": {
      "weight": 1,
      "height": 15,
      "width": 10,
      "length": 27
    }
  }
  ],
  "clientAddress" : {
      "street": "João Provin",
      "district": "Ipiranga",
      "number": "562",
      "CEP": "99300-00",
      "city": "Soledade",
      "state": "Rio Grande do Sul"
    }
}'
```

**Find order by id**
```javascript
curl --location --request GET 'http://localhost:3000/order/63'
```

**Find all orders**
```javascript
curl --location --request GET 'http://localhost:3000/orders'
```

**Delete order**
```javascript
curl --location --request DELETE 'http://localhost:3000/order/63'
```

***-------------------------------------------------------------------------------------------------------------------------------------------------------------***

## Running the tests
```
After installing cypress and cypress-cucumber-preprocessor, all you have to do is:
-to open the cypress interface: 'npm run cypress:open'
-to run all tests by command line: 'npm run cucumber'
-to run an tag by command line: "npm run cucumber '@tag_example'"
```

## Built With
```
NodeJS with Express - Backend framework used.
NPM - Dependency Management.
MySQL - As the database.
Cypress - As the automated testing framework.
```

**README**
```
Please read README.md for details on our code of conduct, and the process for submitting pull requests to us.
```
## Versioning
```
We use git tags for versioning. For the versions available, see the tags on this repository.
```
## Author
***Lucas Gois da Silva***
