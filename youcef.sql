create database youcef;
	use youcef;

 
 	create table client
		(
			id int (2) not null,
			nom varchar (20),
			prenom varchar (20),
			email varchar (50),
			mdp varchar (30),
			primary key (id)
		);

	insert into client (id, nom, prenom, email, mdp) values (1,'Teldjoune','Youcef','youcef@gmail.com','youcefmdp');
	insert into client (id, nom, prenom, email, mdp) values (2,'Ly','Kevyn','kevyn@gmail.com','kevynmdp');
	insert into client (id, nom, prenom, email, mdp) values (3,'Mezdon','Ryan','Ryan@gmail.fr','ryanmdp');
	insert into voiture (idv, marquev, modelv,matriculev , anneev, nbkm_v) values (2,'Audi','RS7','AA-123-CC','2018-01-01','222000');
	insert into moto (idmoto, modele ,marquem, anneem  , nbkm_m ,matriculem ) values (2,'TMAX','Yamaha','2018-01-01','100', 'TT-123-XX');
		



insert into voiture (idv, marquev, modelv,matriculev , anneev, nbkm_v) values (7,'BMW','i8','XW-167-MB','2015-04-01','2312345');
	insert into voiture (idv, marquev, modelv,matriculev , anneev, nbkm_v) values (11,'BMW','i7','WW-187-CB','2017-08-09','20987654');
		insert into voiture (idv, marquev, modelv,matriculev , anneev, nbkm_v) values (20,'Mercedes','Classe A ','MC-666-DO','2018-04-01','100');






insert into moto (idmoto, modele ,marquem, anneem  , nbkm_m ,matriculem ) values (7,'PW80','Yamaha','2006-03-18','1023453', 'PW-800-WW');





insert into moniteur (idm, nomm, prenomm, adressem, salaire, embauche) values (7,'Silva','Thiago','St-Denis','234366700','2015-06-03');
		
	create table user 
		(
			login varchar (50) not null,
			mdp varchar (50) not null,
			droit enum ("admin","user","autre"),
			primary key (login)
		)


		insert into user values
			("admin","root","admin"),
			("ben","123","autre");
