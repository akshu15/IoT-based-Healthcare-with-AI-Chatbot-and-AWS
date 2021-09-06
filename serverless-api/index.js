const AWS = require('aws-sdk');
AWS.config.update( {
  region: 'us-east-1'
});
const dynamodb = new AWS.DynamoDB.DocumentClient();
const dynamodbTableName = 'healthcare-data';
const patientPath = '/patient';
const patientsPath = '/patients';

exports.handler = async function(event) {
  console.log('Request event: ', event);
  let response;
  switch(true) {
    //get patient data using Id
    case event.httpMethod === 'GET' && event.path === patientPath:
      response = await getPatient(event.queryStringParameters.phoneNo);
      break;
    //get all the patients' data
    case event.httpMethod === 'GET' && event.path === patientsPath:
      response = await getPatients();
      break;

    // case event.httpMethod === 'POST' && event.path === patientPath:
    //   response = await saveProduct(JSON.parse(event.body));
    //   break;
    // case event.httpMethod === 'PATCH' && event.path === patientPath:
    //   const requestBody = JSON.parse(event.body);
    //   response = await modifyProduct(requestBody.phoneNo, requestBody.updateKey, requestBody.updateValue);
    //   break;
    // case event.httpMethod === 'DELETE' && event.path === patientPath:
    //   response = await deleteProduct(JSON.parse(event.body).phoneNo);
    //   break;
    // default:
    //   response = buildResponse(404, '404 Not Found');
  }
  return response;
}

async function getPatient(phoneNo) {
  const params = {
    TableName: dynamodbTableName,
    Key: {
      'phoneNo': phoneNo
    }
  }
  return await dynamodb.get(params).promise().then((response) => {
    return buildResponse(200, response.Item);
  }, (error) => {
    console.error('Do your custom error handling here. I am just gonna log it: ', error);
  });
}

async function getPatients() {
  const params = {
    TableName: dynamodbTableName
  }
  const allPatients = await scanDynamoRecords(params, []);
  const body = {
    patients: allPatients
  }
  return buildResponse(200, body);
}

async function scanDynamoRecords(scanParams, itemArray) {
  try {
    const dynamoData = await dynamodb.scan(scanParams).promise();
    itemArray = itemArray.concat(dynamoData.Items);
    if (dynamoData.LastEvaluatedKey) {
      scanParams.ExclusiveStartkey = dynamoData.LastEvaluatedKey;
      return await scanDynamoRecords(scanParams, itemArray);
    }
    return itemArray;
  } catch(error) {
    console.error('Do your custom error handling here. I am just gonna log it: ', error);
  }
}

// async function saveProduct(requestBody) {
//   const params = {
//     TableName: dynamodbTableName,
//     Item: requestBody
//   }
//   return await dynamodb.put(params).promise().then(() => {
//     const body = {
//       Operation: 'SAVE',
//       Message: 'SUCCESS',
//       Item: requestBody
//     }
//     return buildResponse(200, body);
//   }, (error) => {
//     console.error('Do your custom error handling here. I am just gonna log it: ', error);
//   })
// }

// async function modifyProduct(phoneNo, updateKey, updateValue) {
//   const params = {
//     TableName: dynamodbTableName,
//     Key: {
//       'phoneNo': phoneNo
//     },
//     UpdateExpression: `set ${updateKey} = :value`,
//     ExpressionAttributeValues: {
//       ':value': updateValue
//     },
//     ReturnValues: 'UPDATED_NEW'
//   }
//   return await dynamodb.update(params).promise().then((response) => {
//     const body = {
//       Operation: 'UPDATE',
//       Message: 'SUCCESS',
//       UpdatedAttributes: response
//     }
//     return buildResponse(200, body);
//   }, (error) => {
//     console.error('Do your custom error handling here. I am just gonna log it: ', error);
//   })
// }

// async function deleteProduct(phoneNo) {
//   const params = {
//     TableName: dynamodbTableName,
//     Key: {
//       'phoneNo': phoneNo
//     },
//     ReturnValues: 'ALL_OLD'
//   }
//   return await dynamodb.delete(params).promise().then((response) => {
//     const body = {
//       Operation: 'DELETE',
//       Message: 'SUCCESS',
//       Item: response
//     }
//     return buildResponse(200, body);
//   }, (error) => {
//     console.error('Do your custom error handling here. I am just gonna log it: ', error);
//   })
// }

function buildResponse(statusCode, body) {
  return {
    statusCode: statusCode,
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(body)
  }
}