CREATE DATABASE dbcontrolsystemfordoctors CHARACTER utf8 COLLATE utf8_general_ci;

CREATE TABLE tblpatient (
    id INT(11) NOT NULL AUTO_INCREMENT,
    name TEXT,
    age TEXT,
    telephone TEXT,
    address TEXT,
    
    CONSTRAINT pk_tblpatient_id PRIMARY KEY(id)
)ENGINE=InnoDB;

CREATE TABLE tblhistory (
	id INT(11) NOT NULL AUTO_INCREMENT,
    id_patient INT(11) NOT NULL,
    job TEXT,
    weight TEXT,
    height TEXT,
    temperature TEXT,
    heart_rate TEXT,
    family_history TEXT,
    pathological_personal_history TEXT,
    non_pathological_personal_history TEXT,
    allergies TEXT,
    date TEXT,
    next_appointment TEXT,
    treatment TEXT,
    

    CONSTRAINT pk_tblhistory_id PRIMARY KEY(id),
    CONSTRAINT fk_tblhistory_id_patient FOREIGN KEY (id_patient) REFERENCES tblpatient(id)
)ENGINE=InnoDB;


