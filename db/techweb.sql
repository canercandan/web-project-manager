CREATE TABLE tw_usr
(
	usr_id					INT				PRIMARY KEY	AUTO_INCREMENT,
	usr_level_id			INT,
	usr_profil_id			INT,
	usr_login				VARCHAR(20),
	usr_passwd				VARCHAR(40),
	usr_email				VARCHAR(150),
	usr_date				DATE
);

CREATE TABLE tw_usr_level
(
	level_id				INT				PRIMARY KEY	AUTO_INCREMENT,
	level_name				VARCHAR(30)
);

CREATE TABLE tw_profil
(
	profil_id				INT				PRIMARY KEY	AUTO_INCREMENT,
	profil_location_id		INT,
	profil_name				VARCHAR(30),
	profil_fname			VARCHAR(30),
	profil_fphone			VARCHAR(15),
	profil_mphone			VARCHAR(15)
);

CREATE TABLE tw_activity
(
	activity_id				INT				PRIMARY KEY	AUTO_INCREMENT,
	activity_project_id		INT,
	activity_parent_id		INT,
	activity_name			VARCHAR(30),
	activity_charge_total	INT,
	activity_avancement		INT,
	activity_date_begin		DATE,
	activity_status			INT
);

CREATE TABLE tw_project
(
	project_id				INT				PRIMARY KEY	AUTO_INCREMENT,
	project_autor_usr_id	INT,
	project_name			VARCHAR(30),
	project_describ			TEXT,
	project_date			DATE
);

CREATE TABLE tw_title
(
	title_id				INT				PRIMARY KEY,
	title_name				VARCHAR(30)
);

CREATE TABLE tw_member
(
	member_project_id		INT,
	member_usr_id			INT,
	member_title_id			INT,
	member_role_id			INT,
	PRIMARY KEY (member_project_id, member_usr_id)
);

CREATE TABLE tw_member_role
(
	role_id					INT				PRIMARY KEY	AUTO_INCREMENT,
	role_name				VARCHAR(30)
);

CREATE TABLE tw_activity_level
(
	level_id				INT				PRIMARY KEY	AUTO_INCREMENT,
	level_name				VARCHAR(30)
);

CREATE TABLE tw_location
(
	location_id				INT				PRIMARY KEY	AUTO_INCREMENT,
	location_name			VARCHAR(30),
	location_address		TEXT
);

