CREATE DATABASE "VKR"
  WITH ENCODING='UTF8'
       CONNECTION LIMIT=-1;
CREATE SCHEMA IF NOT EXISTS "DOP";
SET SCHEMA 'DOP';
CREATE TABLE "employees" (
	"id_empl" serial NOT NULL,
	"first_name" varchar(50) NOT NULL,
	"date_of_birth" DATE NOT NULL,
	"pasport" varchar NOT NULL,
	" place_of_residence" varchar(2000) NOT NULL,
	" actual_residence" varchar(2000) NOT NULL,
	"tax_numb" int NOT NULL,
	"ins_numb" bigint NOT NULL,
	"telephon_numb" bigint NOT NULL,
	"date_of_reseipt" DATE NOT NULL,
	"date_of_dismissal" DATE NOT NULL,
	"status" int NOT NULL,
	"second_name" varchar(50) NOT NULL,
	" patronymic" varchar(50),
	CONSTRAINT employees_pk PRIMARY KEY ("id_empl")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "divisions" (
	"id_div" serial NOT NULL,
	"name_div" varchar NOT NULL,
	CONSTRAINT divisions_pk PRIMARY KEY ("id_div")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "positions" (
	"id_pos" serial NOT NULL,
	"name_pos" varchar NOT NULL,
	CONSTRAINT positions_pk PRIMARY KEY ("id_pos")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "schedule" (
	"schedule_from" DATE NOT NULL,
	"schedule_to" DATE NOT NULL,
	"id_empl" int NOT NULL
) WITH (
  OIDS=FALSE
);



CREATE TABLE "absence" (
	"absence_from" DATE NOT NULL,
	"absence_to" DATE NOT NULL,
	"cause" int,
	"id_empl" int NOT NULL
) WITH (
  OIDS=FALSE
);



CREATE TABLE "causes" (
	"id_caus" serial NOT NULL,
	"caus_name" varchar NOT NULL,
	CONSTRAINT causes_pk PRIMARY KEY ("id_caus")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "calendar" (
	"id_cal" serial NOT NULL,
	"specification" int NOT NULL,
	"actual" int NOT NULL,
	"month" DATE NOT NULL,
	"id_empl" int,
	CONSTRAINT calendar_pk PRIMARY KEY ("id_cal")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "history_positions" (
	"id_hp" serial NOT NULL,
	"id_empl" int NOT NULL,
	"id_div" int NOT NULL,
	"id_pos" int NOT NULL,
	"pos_from" DATE NOT NULL,
	"pos_to" DATE NOT NULL,
	CONSTRAINT history_positions_pk PRIMARY KEY ("id_hp")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "payment" (
	"id_pay" serial NOT NULL,
	"id_empl" int NOT NULL,
	"pay_from" DATE NOT NULL,
	"pay_to" DATE NOT NULL,
	"pay_sum" int NOT NULL,
	CONSTRAINT payment_pk PRIMARY KEY ("id_pay")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "documents" (
	"id_doc" serial NOT NULL,
	"id_empl" int NOT NULL,
	"date_doc" DATE NOT NULL,
	"action" int NOT NULL,
	"doc_number" varchar NOT NULL,
	CONSTRAINT documents_pk PRIMARY KEY ("id_doc")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "statuses" (
	"id_stat" serial NOT NULL,
	"name_stat" varchar(50) NOT NULL,
	CONSTRAINT statuses_pk PRIMARY KEY ("id_stat")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "actions" (
	"id_act" serial NOT NULL,
	"name_act" varchar,
	CONSTRAINT actions_pk PRIMARY KEY ("id_act")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "logins" (
	"id_log" serial NOT NULL,
	"name_log" varchar UNIQUE,
	"pwd_hash" varchar(40) NOT NULL,
	CONSTRAINT logins_pk PRIMARY KEY ("id_log")
) WITH (
  OIDS=FALSE
);



ALTER TABLE "employees" ADD CONSTRAINT "employees_fk0" FOREIGN KEY ("status") REFERENCES "statuses"("id_stat");

ALTER TABLE "schedule" ADD CONSTRAINT "schedule_fk0" FOREIGN KEY ("id_empl") REFERENCES "employees"("id_empl");

ALTER TABLE "absence" ADD CONSTRAINT "absence_fk0" FOREIGN KEY ("cause") REFERENCES "causes"("id_caus");
ALTER TABLE "absence" ADD CONSTRAINT "absence_fk1" FOREIGN KEY ("id_empl") REFERENCES "employees"("id_empl");

ALTER TABLE "calendar" ADD CONSTRAINT "calendar_fk0" FOREIGN KEY ("id_empl") REFERENCES "employees"("id_empl");

ALTER TABLE "history_positions" ADD CONSTRAINT "history_positions_fk0" FOREIGN KEY ("id_empl") REFERENCES "employees"("id_empl");
ALTER TABLE "history_positions" ADD CONSTRAINT "history_positions_fk1" FOREIGN KEY ("id_div") REFERENCES "divisions"("id_div");
ALTER TABLE "history_positions" ADD CONSTRAINT "history_positions_fk2" FOREIGN KEY ("id_pos") REFERENCES "positions"("id_pos");

ALTER TABLE "payment" ADD CONSTRAINT "payment_fk0" FOREIGN KEY ("id_empl") REFERENCES "employees"("id_empl");

ALTER TABLE "documents" ADD CONSTRAINT "documents_fk0" FOREIGN KEY ("id_empl") REFERENCES "employees"("id_empl");
ALTER TABLE "documents" ADD CONSTRAINT "documents_fk1" FOREIGN KEY ("action") REFERENCES "actions"("id_act");



