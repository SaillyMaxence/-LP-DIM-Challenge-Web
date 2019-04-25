<?php
$addEventRequest = "INSERT INTO Events (EventTitre, EventMessage, EventDateDebut, EventDateFin,EventPriority,EventVisibility,EventCreator) VALUES (:title, :message, :start, :end,:priority,:visibility,:creator)";
$addUserRequest = "INSERT INTO Users (UserName,UserRole) VALUES (:username,0)";
$deleteEventRequest = "DELETE FROM Events WHERE EventId = :id";
$deleteUserRequest = "DELETE FROM Users WHERE UserId = :id";
$selectEventRequest = "SELECT * FROM Events WHERE EventDateDebut <=now() and EventDateFin>=now() order by EventPriority desc";
$selectEventUpdateRequest = "SELECT * FROM Events WHERE EventId = :id";
$selectShowEventRequest = "SELECT EventId,EventTitre,EventMessage,EventDateDebut,EventDateFin,EventVisibility,EventPriority,EventCreator  FROM Events";
$selectRightsRequest = "SELECT * FROM Rights";
$selectShowUserRequest = "SELECT * FROM Users";
$updateEventRequest = "UPDATE Events SET EventTitre = :title, EventMessage = :message, EventDateDebut = :start, EventDateFin = :end,EventPriority= :priority, EventVisibility = :visibility, EventCreator= :creator WHERE EventId = :id";
$updateUserRequest = "UPDATE Users SET UserName = :username, UserRole : role WHERE UserId = :id";
$iframeRestRequest = "SELECT * from Events WHERE EventVisibility = :visibility";