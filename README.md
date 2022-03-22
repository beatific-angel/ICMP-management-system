# ICMP manage 
ICMP monitoring website development

1.	Summary
This website is an ICMP monitoring system.
ICMP can be used to monitor and control the status of the devices in real-time.
For scalability, use Laravel framework.

2.	Feature
a.	Statistics feature
b.	Detect Device status with ping.
c.	Create and Manage Groups
d.	Create and Manage Device and Host 
e.	Account Manage 
f.	User Role 
g.	Active log
h.	Search 

3.	Establish website structure and page 
The website has Dashboard, Device Manage, Group Manage, Setting Page.
-	Dashboard

This page contains Users lists, Group Lists and Device Lists.
And then It contains Group status and Device status parts



User lists – registered users count
Group lists – registered group count
Device lists – registered device count
Group status part
It show all group short information(only show 5 groups order by large down device lists.)
Group Name	Device Lists	Up Device lists	Down Device lists	Action
Xxxxx	5	4	1	View button
Zzzzzz	3	3	0	View button

Device status part
It show all device short information(only show 5 devices order by large down device lists.)
ID	Device Name	Group Name	Ip address	Status 	Last seen
1	Aaa	Xxxxx	1.1.1.1	Failed(or color)	30 seconds ago
2	Bbb	Zzzzzz	1.2.3.4	Failed(or color)	30 seconds ago

-- Group Page
This page contains all group lists.
and the each group have device lists.
So if click group , then we can see device lists.
And then in here, we can add or delete the group
ID	Group Name	Device list	Up Device lists	Down Device lists	Last seen	action
1	Aaa	Xxxxx	1.1.1.1	run(or green color)	30 seconds ago	Edit/ delete icon
2	Bbb	Zzzzzz	1.2.3.4	Failed(or red color)	30 seconds ago	Edit/ delete icon

--Device pages
This page contains all device status. In here, we can add or delete device.
ID	Device Name 	Group Name	Ip Address	Status	Last seen	action
1	Aaa	Xxxxx	1.1.1.1	run(or green color)	30 seconds ago	Edit/ delete icon
2	Bbb	Zzzzzz	1.2.3.4	Failed(or red color)	30 seconds ago	Edit/ delete icon

--Setting pages
Setting page has an account page and users page and role page and active log page.

Account page
can change profile and name and password.
User page
can add users and delete.
Role page
can set role to new user when user add.
Active log
About this site action, can see log history in this page.


4.	Establish database

The database name is icmp_manage

