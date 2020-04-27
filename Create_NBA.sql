drop table if exists merch_price;
drop table if exists merch_type;
drop table if exists matches;
drop table if exists home_team_loc;
drop table if exists sponsored_by;
drop table if exists sponsor;
drop table if exists member_priv;
drop table if exists members;
drop table if exists games_player_played;
drop table if exists player_stats;
drop table if exists plays_on;
drop table if exists player;
drop table if exists game_stats;
drop table if exists teams;


create table teams
	(team_ID numeric(5,0),
		teamName varchar(40),
		city varchar(40),
		budget numeric(10,0),
		primary key (team_ID)
		) ENGINE = INNODB;
  
create table game_stats
	(gameNum numeric(5,0),
		gameLength numeric(5,0),
		Score numeric(5,0),
		primary key (gameNum)
		) ENGINE = INNODB;


create table player
	(playerID numeric(5,0),
		player_name varchar(30),
		height numeric(5,0),
		weight numeric(5,0),
		salary numeric(5,0),
		filename varchar(50),
		image_id numeric(5,0)
		primary key (playerID)
		) ENGINE = INNODB;


create table plays_on
	(playerID numeric(5,0),
		teamID numeric(5,0),
		primary key (playerID)
		,foreign key(playerID) references player(playerID),
		foreign key(teamID) references teams(team_ID)
		) ENGINE = INNODB;

create table player_stats
	(playerID numeric(5,0),
		3pt numeric(5,0),
		2pt numeric(5,0),
		num_of_fouls numeric(5,0),
		primary key (playerID)
		,foreign key(playerID) references player(playerID)
		) ENGINE = INNODB;

create table games_player_played
	(gameNum numeric(5,0),
		playerID numeric(5,0),
		primary key(gameNum),
		foreign key (playerID) references player(playerID),
		foreign key (gameNum) references game_stats(gameNum)
		) ENGINE = INNODB;

create table members
	(membershipID numeric(5,0),
		privileges varchar(30),
		seat_select varchar(30),
		primary key(membershipID)
		) ENGINE = INNODB;

create table member_priv
	(privileges varchar(30),
		players_owned numeric(5,0),
		primary key(privileges)
		-- , foreign key (privileges)
		) ENGINE = INNODB;


create table sponsor
	(sponsor_ID numeric(5,0),
		sponsorName varchar(30),
		primary key(sponsor_ID)
		 ) ENGINE = INNODB;

create table sponsored_by
(sponsor_ID numeric(5,0),
  home_ID numeric(5,0), 
 primary key (sponsor_ID),
 foreign key (home_ID) references teams(team_ID)
 ) ENGINE = INNODB;


create table home_team_loc
(home_ID numeric(5,0),
  city varchar(40), 
 primary key (home_ID),
  foreign key (home_ID) references teams(team_ID)
 ) ENGINE = INNODB;


create table matches
(game_num numeric(5,0),
  home_ID numeric(5,0), 
  away_ID numeric(5,0),
 primary key (game_num,home_ID),
 foreign key (home_ID) references teams(team_ID),
  foreign key (away_ID) references teams(team_ID)
 ) ENGINE = INNODB;


create table merch_type
(merch_ID varchar(40),
  merch_type varchar(40),
  filename varchar(50),
  image_id numeric(5,0)
  primary key (merch_ID)
  ) ENGINE = INNODB;

create table merch_price
(merch_ID varchar(40),
  price numeric(4,0),
 primary key (merch_type),
 foreign key (merch_ID) references merch_type(merch_ID)
 ) ENGINE = INNODB;


