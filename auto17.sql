DROP DATABASE IF EXISTS auto17;

CREATE DATABASE auto17;
USE auto17;
# -----------------------------------------------------------------------------
#       TABLE : PROFIL
# -----------------------------------------------------------------------------


create table profil(
login varchar(25) not null,
mdp varchar(255) not null,
nom varchar(25),
prenom varchar(25),
primary key(login));

insert into profil values ("vincent", md5("123"),"vincent", "tran");

# -----------------------------------------------------------------------------
#       TABLE : ELEVE
# -----------------------------------------------------------------------------

create table eleve(
id int not null auto_increment,
pseudo varchar(255),
mail varchar(255),
motdepasse text,
primary key(id));



# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE ELEVE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_ELEVE_VOITURE
     ON ELEVE (IDVOITURE ASC);

# -----------------------------------------------------------------------------
#       TABLE : VOITURE
# -----------------------------------------------------------------------------

CREATE TABLE VOITURE
 (
   IDVOITURE INTEGER NOT NULL  ,
   NUMIMMATRICULATION VARCHAR(128),
   NBKILOMETRES BIGINT(4),
   MARQUE VARCHAR(128),
   MODELE VARCHAR(128),
   PRIMARY KEY (IDVOITURE));

# -----------------------------------------------------------------------------
#       TABLE : EXAMENCODE
# -----------------------------------------------------------------------------

CREATE TABLE EXAMENCODE(
   IDEXAMENCODE INT NOT NULL  auto_increment,
   LIEUEXAMEN CHAR(32),
   DUREEEXAMEN TIME,
   PRIMARY KEY (IDEXAMENCODE));

# -----------------------------------------------------------------------------
#       TABLE : EXAMENCONDUITE
# -----------------------------------------------------------------------------

CREATE TABLE EXAMENCONDUITE(
   IDEXAMEN INTEGER NOT NULL  auto_increment,
   LIEUEXAMEN VARCHAR(128),
   DUREEEXAMEN CHAR(32),
   PRIMARY KEY (IDEXAMEN));

# -----------------------------------------------------------------------------
#       TABLE : MONITEUR
# -----------------------------------------------------------------------------

CREATE TABLE MONITEUR (
   IDMONITEUR INTEGER NOT NULL  ,
   PRENOMMONITEUR VARCHAR(128),
   NOMMONITEUR VARCHAR(128) NULL  ,
   DATEEMBAUCHE DATE NULL
   , PRIMARY KEY (IDMONITEUR)
 )
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : LECON
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS LECON
 (
   IDLECON INTEGER NOT NULL  ,
   IDVOITURE INTEGER NOT NULL  ,
   DATELECON DATETIME NULL
   , PRIMARY KEY (IDLECON)
 )
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE LECON
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_LECON_VOITURE
     ON LECON (IDVOITURE ASC);

# -----------------------------------------------------------------------------
#       TABLE : PASSERCODE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PASSERCODE
 (
   IDEXAMENCODE INTEGER NOT NULL  ,
   IDCLIENT INTEGER NOT NULL  ,
   DATEHEURECODE DATETIME NULL  ,
   RESULTATCODE BOOL NULL
   , PRIMARY KEY (IDEXAMENCODE,IDCLIENT)
 )
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PASSERCODE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PASSERCODE_EXAMENCODE
     ON PASSERCODE (IDEXAMENCODE ASC);

CREATE  INDEX I_FK_PASSERCODE_ELEVE
     ON PASSERCODE (IDCLIENT ASC);

# -----------------------------------------------------------------------------
#       TABLE : PASSERCONDUITE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PASSERCONDUITE
 (
   IDEXAMEN INTEGER NOT NULL  ,
   IDCLIENT INTEGER NOT NULL  ,
   DATEHEURECONDUITE CHAR(32) NULL  ,
   RESULTATEXAMEN BOOL NULL
   , PRIMARY KEY (IDEXAMEN,IDCLIENT)
 )
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PASSERCONDUITE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PASSERCONDUITE_EXAMENCONDUITE
     ON PASSERCONDUITE (IDEXAMEN ASC);

CREATE  INDEX I_FK_PASSERCONDUITE_ELEVE
     ON PASSERCONDUITE (IDCLIENT ASC);

# -----------------------------------------------------------------------------
#       TABLE : PLANNING
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PLANNING
 (
   IDLECON INTEGER NOT NULL  ,
   IDMONITEUR INTEGER NOT NULL  ,
   IDCLIENT INTEGER NOT NULL  ,
   DATEHEUREDEBUT DATETIME NULL  ,
   DATEHEUREFIN DATETIME NULL
   , PRIMARY KEY (IDLECON,IDMONITEUR,IDCLIENT)
 )
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PLANNING
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PLANNING_LECON
     ON PLANNING (IDLECON ASC);

CREATE  INDEX I_FK_PLANNING_MONITEUR
     ON PLANNING (IDMONITEUR ASC);

CREATE  INDEX I_FK_PLANNING_ELEVE
     ON PLANNING (IDCLIENT ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE ELEVE
  ADD FOREIGN KEY FK_ELEVE_VOITURE (IDVOITURE)
      REFERENCES VOITURE (IDVOITURE) ;


ALTER TABLE LECON
  ADD FOREIGN KEY FK_LECON_VOITURE (IDVOITURE)
      REFERENCES VOITURE (IDVOITURE) ;


ALTER TABLE PASSERCODE
  ADD FOREIGN KEY FK_PASSERCODE_EXAMENCODE (IDEXAMENCODE)
      REFERENCES EXAMENCODE (IDEXAMENCODE) ;


ALTER TABLE PASSERCODE
  ADD FOREIGN KEY FK_PASSERCODE_ELEVE (IDCLIENT)
      REFERENCES ELEVE (IDCLIENT) ;


ALTER TABLE PASSERCONDUITE
  ADD FOREIGN KEY FK_PASSERCONDUITE_EXAMENCONDUITE (IDEXAMEN)
      REFERENCES EXAMENCONDUITE (IDEXAMEN) ;


ALTER TABLE PASSERCONDUITE
  ADD FOREIGN KEY FK_PASSERCONDUITE_ELEVE (IDCLIENT)
      REFERENCES ELEVE (IDCLIENT) ;


ALTER TABLE PLANNING
  ADD FOREIGN KEY FK_PLANNING_LECON (IDLECON)
      REFERENCES LECON (IDLECON) ;


ALTER TABLE PLANNING
  ADD FOREIGN KEY FK_PLANNING_MONITEUR (IDMONITEUR)
      REFERENCES MONITEUR (IDMONITEUR) ;


ALTER TABLE PLANNING
  ADD FOREIGN KEY FK_PLANNING_ELEVE (IDCLIENT)
      REFERENCES ELEVE (IDCLIENT) ;

