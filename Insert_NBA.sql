delete from merch_price;
delete from merch_type;
delete from matches;
delete from home_team_loc;
delete from sponsored_by;
delete from sponsor;
delete from member_priv;
delete from members;
delete from games_player_played;
delete from player_stats;
delete from plays_on;
delete from player;
delete from game_stats;
delete from teams;

insert into teams values('122','Hornets','Charlotte','40000');
insert into teams values('123','Mavericks','Dallas','50000');
insert into teams values('124','Lakers','LosAngeles','400000');
insert into teams values('125','GoldenState','SanFran','70000');
insert into teams values('126','Celtics','Boston','100000');

insert into game_stats values('1','60','12');
insert into game_stats values('2','60','67');
insert into game_stats values('3','60','100');
insert into game_stats values('4','60','80');
insert into game_stats values('5','60','56');

insert into player values('001','Lebron','6.9','250','70000');
insert into player values('002','Jordan','6.0','180','75000');
insert into player values('003','Bryant','6.6','212','80000');
insert into player values('004','Curry','6.3','190','70000');

insert into plays_on values('001','123');
insert into plays_on values('002','123');
insert into plays_on values('003','124');
insert into plays_on values('004','125');

insert into player_stats values('001','4','3','1');
insert into player_stats values('002','0','5','3');
insert into player_stats values('003','4','3','5');
insert into player_stats values('004','5','2','0');

insert into games_player_played values('1','1');
insert into games_player_played values('2','2');
insert into games_player_played values('3','3');
insert into games_player_played values('4','4');

insert into members values('010','T','Section1');
insert into members values('020','T','Section1');
insert into members values('030','F','Section6');

insert into member_priv values('T', '10');	
insert into member_priv values('F', '0');

insert into sponsor values('1','Gatorade');
insert into sponsor values('2','Under Armour');
insert into sponsor values('3','Nike');
insert into sponsor values('4','Harley Davidson');
insert into sponsor values('5','Reebock');

insert into sponsored_by values('1','122');
insert into sponsored_by values('2','123');
insert into sponsored_by values('3','124');
insert into sponsored_by values('4','125');
insert into sponsored_by values('5','126');


insert into home_team_loc values('122', 'Asheville');
insert into home_team_loc values('123','greensbro');
insert into home_team_loc values('124','newyork');
insert into home_team_loc values('125','florida');
insert into home_team_loc values('126','las vegas');


insert into matches values('1','122','123');
insert into matches values('2','123','124');
insert into matches values('3','123','125');
insert into matches values('4','125','126');
insert into matches values('5','126','122');

insert into merch_type values('000','shirt','shirt.jpg','1');
insert into merch_type values('001','cap','cap.jpg','1');
insert into merch_type values('002','jersey','jersey.jpg','1');
insert into merch_type values('003','ball','ball.jpg','1');


insert into merch_price values('000','200');
insert into merch_price values('001','100');
insert into merch_price values('004','100');
insert into merch_price values('003','100');
insert into merch_price values('002','300');
