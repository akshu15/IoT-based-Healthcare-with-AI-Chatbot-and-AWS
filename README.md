# IoT-based-Healthcare-with AI Chatbot
This project aims at  providing an IoT based remote Health care kit and AI Chatbot which provides healthcare tips to patients, and effectively, reducing the cost of customer service and providing a vital communication link between doctors and patients.   

![image](https://user-images.githubusercontent.com/52970601/132244204-713f9358-4875-4fe6-a3b4-50f256470499.png)

To use the kit, the patient first needs to register themselves to the system. After registration, the patient can then wear the connected sensors to get their health parameters monitored. This data is then sent to the cloud where it will be stored and an Electronic History Record (EHR) of each patient will be maintained for future usage.
A web based application is used where the available doctors from any location can then analyze the patient’s records and notify them of their results. The application enables us to monitor the user’s health while providing access to all the earlier data to lessen the hassle and improve the lifestyle of individuals. 
Furthermore, the website will include health blogs, the history of the patient, and a chatbot that will provide a Self- assessment of mild symptoms.For better understanding, the proposed system has been divided into four sub-topics:
1.	IoT based Healthcare Kit
2.	Connectivity with Cloud
3.	Chatbot
4.	Web-based Portal
# 1.	IoT based Healthcare Kit
Here we have used Nextion displays to build a Graphical User Interface (GUI). 

<img width="478" alt="gui" src="https://user-images.githubusercontent.com/52970601/132244487-e8cd0f6a-9723-4cd9-b676-2be0a6ba2b2e.png">

After registration, the instruction manual for usage of the kit will appear so that the user comes to know how to use the kit without any difficulty. 
Finally, the last step would be to use the sensors. The kit includes a Blood pressure sensor, a Temperature sensor, and Pulse Oximeter MAX30102 in which oxygen is in percentage and the heart rate is measured in BPM. The wearable sensors will collect the health parameters and their value will be displayed on the screen.

![circuit](https://user-images.githubusercontent.com/52970601/132249243-f269e9b1-3d2f-4881-ab68-24b51224cc09.jpg)

Th above figure represents Healthkit Circuit design using Tinkercad.
The collected sensor data is then sent to cloud and to display this flow we have used Node-RED.
# 2.	Connectivity with Cloud
<img width="546" alt="1" src="https://user-images.githubusercontent.com/52970601/132248770-c4260987-682a-4095-bc1e-3b65e811549c.png">

Flow diagram of storing sensor data

![nodered](https://user-images.githubusercontent.com/52970601/132248918-76e598a6-6964-4fdb-81e0-5bf6c939c26f.jpg)

The above diagram represents how we will send the sensor data from Node-RED to AWS IoT core.
First, we have created a function ‘sensorValues’ for generating random data for our sensors. This function node is then connected to the E-doc node which is the MQTT Out node for publishing data. In MQTT out node, we have added the device data endpoint to connect to AWS, then uploaded the required certificates in TLS configuration, and lastly entered a topic name. We will then deploy our flow and send the data to AWS.

![client](https://user-images.githubusercontent.com/52970601/132248979-8979ba40-f97b-4c22-b002-c16d50cf3d9e.jpg)

We have used MQTT test client to monitor the MQTT messages being passed to AWS. Devices/Node-RED publish MQTT messages that are identified by topics to communicate with AWS IoT. To test this, we have subscribed to our MQTT message topic that is 'edoc' and from the diagram we can see the incoming data from node-RED.

![db](https://user-images.githubusercontent.com/52970601/132248992-7e716609-4209-456a-84c1-970ab820d6f7.jpg)

DynamoDB healthcare-data table

For storing the received data we have used the Amazon DynamoDB service. It is a NoSQL database service that supports key-value and document data structures. In DynamoDB, we have built a table named healthcare-data. Using the Rules engine we have defined a Rule in the AWS IoT that will store sensor data received from Node-RED MQTT directly into DynamoDB. From the above figure we can see that the data sent from Node-RED is getting stored in our DynamoDB healthcare-data table.

<img width="546" alt="2" src="https://user-images.githubusercontent.com/52970601/132248785-1bb06e4f-c930-4efc-90ff-ca76ba0e4d72.png">

Flow diagram of retrieving sensor data

Now to get the data from DynamoDB we have written a Lambda function. Then we created a REST API for our lambda function using Amazon API Gateway. This REST API uses a request/response model where a client sends a request to a service and the service responds synchronously.
For API Testing we have used Postman. Here, Get requests are used to retrieve the information from the Invoke URL we received from AWS. From the fig.5.4 we can see the GET request being successful.

![postman](https://user-images.githubusercontent.com/52970601/132248630-5187a31d-46db-4485-a81b-e87eb3082378.jpg)

# 3.	Chatbot
We have used Rasa for developing our healthbot. Rasa is an open source machine learning framework for building AI assistants and chatbots. 
Following is the snippet for the terminal version of the chatbot.

![image](https://user-images.githubusercontent.com/52970601/132245866-eb5b440e-b811-426a-b3c4-d30dd3f7f0b5.png)

The objective of this chatbot is that it will ask questions related to the options that are being selected and by doing so it concludes and suggests remedies and medications to the user.

<img width="600" alt="chatbot" src="https://user-images.githubusercontent.com/52970601/132249215-a1108449-8e20-426c-b2d2-16ff7dfc30b2.png">

# 4.	Web-based Portal
Website Front end for both patient and doctor

![1](https://user-images.githubusercontent.com/52970601/132249424-52d7cec1-f2a6-44da-aef8-b51a505a7a14.jpg)

# 4.1 Patient's side
Doctor’s List for Patient to book appointment

![2](https://user-images.githubusercontent.com/52970601/132249413-4935e9d8-fe0e-4ba7-af66-29fb1a9b210f.jpg)

After the patient signs up, the patient will able the see the doctors that are associated with our website. The schedule and availability of doctors can also be seen as shown in the figure. The patient can book an appointment according to the doctors specification. He also has the right to cancel the appointment. The analysis and the report done by sensors can also been seen in the patient’s portal.
# 4.2 Doctor's Side
Patient’s appointment with all health parameters and doctor’s prescription

![3](https://user-images.githubusercontent.com/52970601/132249441-4eaa9940-34d9-42ee-a634-be776438dd9f.jpg)

The doctor’s side portal will get access to each of their patient’s documents. They can edit their profile and accept/reject an appointment of the patient. The doctor can add the prescription in the details only to avoid any complexity. If required, then the doctor can ask the patient to come for a visit or else the diagnosis can be done online itself. As all the data is stored in the cloud doctor from any location can analyze the patient’s records and notify them of their result.

![4](https://user-images.githubusercontent.com/52970601/132249452-f9db732b-6e1c-4055-98ca-2e19cfdb19d9.jpg)

# 4.3 Admin Side
The admin is can overview the entire portal. The admin has a dashboard which lets him to analyze total appointment till date and total registered patient.

![5 (3)](https://user-images.githubusercontent.com/52970601/132250032-7d550f8d-99cd-436a-ab9f-aaa37e2ba55e.png)

He can see the newly registered doctors and patients. He has the right to inactive the doctor if he is not available. The admin can see the schedule of all the doctors. He can also check the appointments for a particular doctor and can see till what process the doctor has been in terms of completion. He has the right to add or remove doctors.

Admin side Doctor Management

![6](https://user-images.githubusercontent.com/52970601/132249469-2e078f03-0800-4272-8b2e-ecc15becdd0b.jpg)

Admin side Patient Management

![7](https://user-images.githubusercontent.com/52970601/132249481-e19e8482-1e49-4e80-8ee4-ceefb09a64e7.png)

# Publication
Paper entitled “Ru-Urb IoT-AI powered Healthcare Kit” is presented at “5th International Conference on Intelligent Computing and Control Systems ICICCS 2021” by “Shreya Bhutada”, “Akshata Singh”, “Purvika Gaikar ”and “Kaushiki Upadhyaya”.
