CREATE TABLE IF NOT EXISTS tw_activity (
  activity_id INT NOT NULL auto_increment,
  activity_project_id INT default NULL,
  activity_parent_id INT default NULL,
  activity_name varchar(30) default NULL,
  activity_charge_total INT default NULL,
  activity_date_begin date default NULL,
  activity_date_end date default NULL,
  activity_describtion text,
  PRIMARY KEY  (activity_id)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS tw_activity_member (
  activity_member_activity_id INT NOT NULL,
  activity_member_usr_id INT NOT NULL,
  activity_level INT NOT NULL,
  activity_member_date_start date NOT NULL,
  activity_member_date_end date default NULL,
  activity_work INT default NOT NULL,
  PRIMARY KEY  (activity_member_usr_id, activity_member_activity_id)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS tw_location (
  location_id INT NOT NULL auto_increment,
  location_name varchar(30) default NULL,
  location_address text,
  PRIMARY KEY  (location_id)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS tw_member (
  member_project_id INT NOT NULL default '0',
  member_usr_id INT NOT NULL default '0',
  member_role_id INT default NULL,
  member_date_start date NOT NULL,
  member_date_end date default NULL,
  PRIMARY KEY  (member_project_id, member_usr_id)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS tw_member_role (
  role_id INT NOT NULL auto_increment,
  role_name varchar(30) default NULL,
  PRIMARY KEY  (role_id)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS tw_profil (
  profil_usr_id INT NOT NULL,
  profil_location_id INT default NULL,
  profil_name varchar(30) default NULL,
  profil_fname varchar(30) default NULL,
  profil_fphone varchar(15) default NULL,
  profil_mphone varchar(15) default NULL,
  profil_title_id INT NOT NULL,
  profil_perso_adress text NOT NULL,
  PRIMARY KEY  (profil_usr_id)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS tw_project (
  project_id INT NOT NULL auto_increment,
  project_autor_usr_id INT default NULL,
  project_name varchar(30) default NULL,
  project_describ text,
  project_date date default NULL,
  PRIMARY KEY  (project_id)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS tw_title (
  title_id INT NOT NULL auto_increment,
  title_name varchar(30) default NULL,
  PRIMARY KEY  (title_id)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS tw_usr (
  usr_id INT NOT NULL auto_increment,
  usr_login varchar(20) default NULL,
  usr_passwd varchar(40) default NULL,
  usr_email varchar(150) default NULL,
  usr_date date default NULL,
  usr_usr_level_id INT NOT NULL,
  PRIMARY KEY  (usr_id)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS tw_usr_level (
  level_id INT NOT NULL auto_increment,
  level_name varchar(30) default NULL,
  PRIMARY KEY  (level_id)
) ENGINE=MyISAM;

INSERT INTO tw_usr_level (level_id, level_name)
VALUES (1, 'Administrator Root');

INSERT INTO tw_usr_level (level_id, level_name)
VALUES (2, 'Administrator');

INSERT INTO tw_usr_level (level_id, level_name)
VALUES (3, 'Chef de projet');

INSERT INTO tw_usr_level (level_id, level_name)
VALUES (4, 'Participant');
