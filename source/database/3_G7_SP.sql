/* G7_Procedures */	

/*  
-- PROCEDURE spUserUpdate
--	creates/updates user info
-- Params:
--  UserId - the specified user id
--	UserName - input username
--  RealName - input realname
--  Passwd - input password
--  Passwd1 - input new password
--  Gender - input gender (0-unspecified, 1-Female, 2-Male)
--  Age - input age (range: 1~100)
--  Email - input email address
--  Phone - input phone number, not used
--  City - input city name
--  Occupation - input occupation
--  Hobbies - input hobbies
--  AvatarId - input avatar id, associated with the user's avatar
--  UserIp - user's login ip address
*/
drop procedure if exists spUserUpdate;
create procedure spUserUpdate(
	UserId      int,
	UserName    varchar(30),
	RealName    varchar(30),
	Passwd      varchar(32),
	Passwd1	   	varchar(32),
	Gender      char(1),
	Age         tinyint,
	Email       varchar(50),
	Phone 		varchar(30),
	City		varchar(30),
	Occupation  varchar(30),
	Hobbies		varchar(100),
	AvatarId 	tinyint,
	UserIp 		varchar(15)	
)
begin
    if not exists (select 1 from G7_Users u where u.UserName = UserName) then
	  if UserId is null or UserId = 0 then
		insert into G7_Users(
			UserName,
			RealName,
			Passwd,
			Gender,
			Age,
			Email,
			Phone,
			City,
			Occupation,
			Hobbies,
			GroupId,
			AvatarId,
			RegIp,
			JoinDate,
			LastIp,
			LastVisit,
			IsOnline)
		values(
			UserName,
			RealName,
			MD5(Passwd),
			Gender,
			Age,
			Email,
			Phone,
			City,
			Occupation,
			Hobbies,
			3,
			1,
			UserIp,
			current_timestamp(),
			UserIp,
			current_timestamp(),
			1);
		select last_insert_id() into UserId;
	  else
	    if not exists (select 1 from G7_Users a where a.UserId = UserId and a.Passwd = MD5(Passwd)) then
			set UserId = 1;
		else
			if(Passwd1 is null or Passwd1 = '') then 
				update G7_Users a
				set a.RealName = RealName,
					a.Gender = Gender,
					a.Age = Age,
					a.Email = Email,
					a.Phone = Phone,
					a.City = City,
					a.Occupation = Occupation,
					a.Hobbies = Hobbies,
					a.AvatarId = AvatarId,
					a.LastIp = UserIp,
					a.LastVisit = current_timestamp(),
					a.IsOnline = 1	
				where a.UserId = UserId;	
			else
				update G7_Users a
				set a.RealName = RealName,
					a.Passwd = MD5(Passwd1),
					a.Gender = Gender,
					a.Age = Age,
					a.Email = Email,
					a.Phone = Phone,
					a.City = City,
					a.Occupation = Occupation,
					a.Hobbies = Hobbies,
					a.AvatarId = AvatarId,
					a.LastIp = UserIp,
					a.LastVisit = current_timestamp(),
					a.IsOnline = 1	
				where a.UserId = UserId;
			end if;
		end if;
	  end if;
	end if;
	
	if UserId is null or UserId = 0 then
		set UserId = 1;
	end if;
	select UserId as UserId;
end;

/*  
-- PROCEDURE spUserInfo
--	Returns user info
-- Params:
--	UserId - the specified UserId
*/
drop procedure if exists spUserInfo;
create procedure spUserInfo(
	UserId	int
)
begin
	select Email, RealName, Occupation, Hobbies, Age, Gender, City from G7_Users a where a.UserId = UserId;
end;

/*  
-- PROCEDURE spUserRemove
--	deregisters user account
-- Params:
--	UserId - the specified UserId
*/
drop procedure if exists spUserRemove;
create procedure spUserRemove(
	UserId	int
)
begin
	update G7_Users a set a.IsValid = 0 where a.UserId = UserId;
end;

/*  
-- PROCEDURE spUserFindPassword
--	recover password
-- Params:
--	UserName - input username
--  Email - input email address
--  Passwd - input password
*/
drop procedure if exists spUserFindPassword;
create procedure spUserFindPassword(
	UserName	varchar(30),
	Email       varchar(50),
	Passwd      varchar(32)
)
begin
	update G7_Users a set a.Passwd = MD5(Passwd) where a.UserName = UserName and a.Email = Email;
end;

/*  
-- PROCEDURE spUserFind
--	Checks if the current user exists based on the 
--  input username and password
-- Params:
--	UserName - input username
--  Passwd - input password
*/
drop procedure if exists spUserFind;
create procedure spUserFind(
	UserName	varchar(30),
	Passwd      varchar(32)
)
begin
	select a.UserId, a.UserName, a.Email 
	from G7_Users a 
	where a.UserName = UserName 
	and a.Passwd = MD5(Passwd) 
	and a.IsValid = 1;
end;

/*  
-- PROCEDURE spUserFindName
--	Checks the availability for username
-- Params:
--	UserName - input username
*/
drop procedure if exists spUserFindName;
create procedure spUserFindName(
	UserName	varchar(30)
)
begin
	select 1 from G7_Users a where a.UserName = UserName;
end;

/*  
-- PROCEDURE spUserIdByUserName
--	gets userId by username
-- Params:
--	UserName - input username
-- Outputs:
--  UserId
*/
drop procedure if exists spUserIdByUserName;
create procedure spUserIdByUserName(
	UserName	varchar(30)
)
begin
	select a.UserId from G7_Users a where a.UserName = UserName;
end;

/*  
-- PROCEDURE spUserEmailByUserName
--	gets email by username
-- Params:
--	UserName - input UserName
-- Outputs:
--  Email
*/
drop procedure if exists spUserEmailByUserName;
create procedure spUserEmailByUserName(
	UserName	varchar(30)
)
begin
	select a.Email from G7_Users a where a.UserName = UserName;
end;

/*  
-- PROCEDURE spContactUpdate
--	stores/updates the current user's contact post
-- Params:
--  YourName - contact name
--	Email - user email
--	Subject - feedback, registration issue or others
--	Message - detailed content
*/
drop procedure if exists spContactUpdate;
create procedure spContactUpdate(
	ContactId   int,
	YourName 	varchar(30),
	Email		varchar(50),
	Subject		varchar(50),
	Message		text
)
begin
	if ContactId is null or ContactId = 0 then
		insert into G7_Contact(YourName, Email, Subject, Message) values(YourName, Email, Subject, Message);	
	else
		update G7_Contact a set a.IsReplied = 1 where a.ContactId = ContactId;
	end if;
end;
