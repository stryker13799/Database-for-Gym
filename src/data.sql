
drop table exercise_plan;
drop table muscle;
drop table equipment;
drop table exercise;

drop table workout_plan ;
drop table daily_update;

drop table member ;


CREATE TABLE member(last_name varchar2(35),first_name varchar2(35),gender varchar2(10),phone_num number(35),password varchar2(35),bmi number(30),muscle_size number(20),height number(35),weight number(10), login_id varchar2(15), email varchar2(35), constraint pk_mem primary key(login_id));



CREATE TABLE exercise(ex_name varchar2(35) primary key);

CREATE TABLE equipment(equip_name varchar2(35) primary key);

CREATE TABLE workout_plan(login_id varchar2(35),day varchar2(20),fats number(2),carbs number(2),proteins number(2), constraint fk_wp foreign key(login_id) references member(login_id),constraint pk_wp primary key(login_id,day));

CREATE TABLE muscle (muscle_name varchar2(20) primary key);


CREATE TABLE EXERCISE_PLAN(login_id varchar2(15) , day varchar2(20),workout_time number(10), muscle_name varchar2(20), ex_name varchar2(20), equip_name varchar2(20), constraint fk_equipment foreign key(equip_name) references equipment (equip_name),constraint fk_exerc foreign key(login_id,day) references workout_plan(login_id,day), constraint pk_muscle foreign key(muscle_name) references muscle(muscle_name),constraint fk_exername foreign key(ex_name) references exercise(ex_name),constraint pk_exer primary key(login_id,day,muscle_name));


CREATE TABLE daily_update(login_id varchar2(15),day varchar2(20),weight number(30),bmi number(30),muscle_size number(20),date_time date,achieved number(10),fats number(2),carbs number(2),proteins number(2),constraint fk_wdai foreign key(login_id) references member(login_id),constraint pk_daip primary key(login_id,date_time));





CREATE OR REPLACE PROCEDURE workout(login_id varchar2, day varchar2, fats NUMBER,proteins NUMBER, carb NUMBER) IS
   s workout_plan.login_id%TYPE; 
 
BEGIN
    SELECT login_id
     INTO s
     FROM workout_plan
     where login_id = login_id AND day = day;

     IF length(s) > 0 THEN
       UPDATE workout_plan
       SET fats =fats,proteins = proteins, carbs = carb
       where login_id =login_id AND day=day;
     ELSE
    insert into workout_plan
        values(login_id,day,fats,carb,proteins);
     END IF;

END;
/


insert into exercise values ('squats');
insert into exercise values ('deadlift');
insert into exercise values ('legpress');
insert into exercise values ('dumbellrows');
insert into exercise values ('running');
insert into exercise values ('chestlift');
insert into exercise values ('shoulderpress');
insert into exercise values ('crunches');

insert into muscle values ('chestmuscle');
insert into muscle values ('legmuscle');
insert into muscle values ('triceps');
insert into muscle values ('biceps');
insert into muscle values ('thighs');
insert into muscle values ('shouldermuscle');
insert into muscle values ('abs');

insert into equipment values ('dumbells');
insert into equipment values ('tredmill');
insert into equipment values ('butterfly');
insert into equipment values ('eliptical');
insert into equipment values ('cycle');
insert into equipment values ('leg press');
insert into equipment values ('None');