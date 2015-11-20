/* G7_Data */
insert into G7_Users(UserName,RealName,Passwd,Gender,Age,Email,Phone,City,Occupation,Hobbies,GroupId,AvatarId,RegIp,JoinDate,LastIp,LastVisit,IsOnline)
	values('guest','guest',MD5('pass'),'0',18,'g7guest@gmail.com','6043331111','Vancouver','','',1,1,'192.168.3.8',current_timestamp(),'192.168.3.10',current_timestamp(),1);
insert into G7_Users(UserName,RealName,Passwd,Gender,Age,Email,Phone,City,Occupation,Hobbies,GroupId,AvatarId,RegIp,JoinDate,LastIp,LastVisit,IsOnline)
	values('admin','admin',MD5('pass'),'0',18,'vango@vango.ca','6043331111','Vancouver','Student','Swimming',2,1,'192.168.3.8',current_timestamp(),'192.168.3.10',current_timestamp(),1);


