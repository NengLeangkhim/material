--CREATE TABLE----------------------------------------------------
DROP TABLE IF EXISTS bsc_account;
CREATE TABLE bsc_account
			(
				id integer NOT NULL GENERATED ALWAYS AS IDENTITY ,
				name_en varchar not null UNIQUE,
				name_kh varchar not null UNIQUE,
				code integer UNIQUE,
				create_date timestamp without time zone,
				create_by integer,
				is_deleted boolean,
			   PRIMARY KEY (id)
			);
DROP TABLE IF EXISTS bsc_account_type;
CREATE TABLE bsc_account_type
			(
				id integer NOT NULL GENERATED ALWAYS AS IDENTITY ,
				bsc_account_id integer not null,
				name_en varchar not null UNIQUE,
				name_kh varchar not null UNIQUE,
				code_range_from integer UNIQUE,
				code_range_to integer UNIQUE,
				create_date timestamp without time zone,
				create_by integer,
				is_deleted boolean,
			   PRIMARY KEY (id)
			);
DROP TABLE IF EXISTS bsc_account_charts;
CREATE TABLE bsc_account_charts
			(
				id integer NOT NULL GENERATED ALWAYS AS IDENTITY ,
				bsc_account_type_id integer not null,
				name_en varchar not null UNIQUE,
				name_kh varchar not null UNIQUE,
				code integer UNIQUE,
				ma_currency_id integer not null,
				ma_company_id integer not null,
				parent_id integer,
				create_date timestamp without time zone,
				create_by integer,
				is_deleted boolean,
			   PRIMARY KEY (id)
			);
--CREATE TABLE----------------------------------------------------
--CREATE FUNCTION automate---------------------------------------------------------------
CREATE OR REPLACE FUNCTION public.automate(
	nignore character varying,
	nmode varchar)
    RETURNS void
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
    
AS $BODY$
-- declare r record;
--mode:create_function,relationship,drop_function
DECLARE ta record;
DECLARE col record;
DECLARE func record;
DECLARE ignore_col record;
DECLARE nsql varchar:='SELECT * FROM information_schema.TABLES WHERE table_schema=''public''';
DECLARE tem_table varchar;
DECLARE table_exist INTEGER;
DECLARE func_exist INTEGER;
BEGIN

if nignore is not null then
	nsql=nsql||' and table_name not in ((select unnest('''||nignore||'''::varchar[])))';
end if;
if nmode='drop_function' and nignore is not null then
	for ignore_col in execute ('select unnest('''||nignore||'''::varchar[])') loop
		for func in EXECUTE concat('select * from information_schema.routines
										where specific_schema=''public'' and routine_name like ''%_'||ignore_col.unnest||'''') loop
			if (select split_part(func.routine_name, '_', 1))<>'insert' then
				raise info '%','   '||func.routine_type||': '||func.routine_name;
				EXECUTE concat('select count (*) from information_schema.routines where specific_schema=''public'' and routine_name='''||func.routine_name||'''') into func_exist;
				if func_exist<=1 then 
					EXECUTE concat('DROP FUNCTION IF EXISTS '||func.routine_name);
				end if;
			end if;
				end loop;
	end loop;
end if;
 for ta in execute concat(nsql||'order by table_name') loop
-- 	  raise info '-------------------------------------------------------------------------------';
		raise notice '%','Table: '||ta.table_name;
	  if nmode='create_function' or nmode='relationship' then --mode
			for col in (SELECT * FROM information_schema.COLUMNS WHERE table_schema='public' and table_name=ta.table_name) loop
				if nmode='relationship' then
					if right(col.column_name, 2) ='id' and length(col.column_name)>2 then 
						raise info '%','COLUMN '||col.column_name;
						raise info '%','   ->is FK';
						tem_table=(select left(col.column_name,length(col.column_name)-3));
						execute concat('SELECT count(*) FROM information_schema.TABLES WHERE table_schema=''public'' 
							and table_name='''||tem_table||'''') into table_exist;
						if table_exist >0 then
							EXECUTE concat('ALTER TABLE public.'||ta.table_name||'
							ADD CONSTRAINT '||col.column_name||'_fkey FOREIGN KEY ('||col.column_name||')
							REFERENCES public.'||tem_table||' (id) MATCH SIMPLE
							ON UPDATE NO ACTION
							ON DELETE NO ACTION
							NOT VALID');
						else
							if tem_table='parent' then 
								raise info '%','COLUMN '||col.column_name;
								raise info '%','   ->is FK';
								EXECUTE concat('ALTER TABLE public.'||ta.table_name||'
								ADD CONSTRAINT '||ta.table_name||'_'||col.column_name||'_fkey FOREIGN KEY ('||col.column_name||')
								REFERENCES public.'||ta.table_name||' (id) MATCH SIMPLE
								ON UPDATE NO ACTION
								ON DELETE NO ACTION
								NOT VALID');
							end if;
						end if;	
					else 
						if col.column_name='create_by' or col.column_name='approve_by' or col.column_name='request_by' 
						or col.column_name='action_by' then
							raise info '%','COLUMN '||col.column_name;
							raise info '%','   ->is FK';
							EXECUTE concat('ALTER TABLE public.'||ta.table_name||'
							ADD CONSTRAINT '||col.column_name||'_fkey FOREIGN KEY ('||col.column_name||')
							REFERENCES public.ma_user (id) MATCH SIMPLE
							ON UPDATE NO ACTION
							ON DELETE NO ACTION
							NOT VALID');
						end if;-- mode relation ship
						if nmode='create_function' then
							
						end if;
					end if;--mode
				end if;
	-- 			execute CONCAT('ALTER TABLE "public"."'||r.table_name||'" DROP CONSTRAINT '||r.constraint_name);
			end loop;
		else 
			if nmode='drop_function' then
				raise info '=======================================';
				for func in EXECUTE concat('select * from information_schema.routines
										where specific_schema=''public'' and routine_name like ''%_'||ta.table_name||'''') loop
										raise info '%','   '||func.routine_type||': '||func.routine_name;
										EXECUTE concat('DROP FUNCTION IF EXISTS '||func.routine_name);
				end loop;
			end if; --mode
		end if; --mode
		raise info '-------------------------------------------------------------------------------';
 end loop;
END
$BODY$;
--CREATE FUNCTION automate---------------------------------------------------------------
--CREATE TYPE----------------------------------------------------
DROP TYPE IF EXISTS product_group;
CREATE TYPE product_group AS ENUM ('service', 'product');
--CREATE TYPE----------------------------------------------------

--START DROP FUNCTION------------------------------
drop function if exists delete_key_gazetteers(int4, int4);
drop function if exists insert_key_gazetteers(varchar, varchar, varchar, varchar, varchar, int4);
drop function if exists update_aes_key(int4, int4, varchar, varchar);
drop function if exists update_key_gazetteers(int4, int4, varchar, varchar, varchar, varchar, varchar);
drop function if exists delete_recycle_table(int4, int4);
drop function if exists insert_recycle_table(varchar, int4, varchar, varchar, int4, recycle_type, varchar, varchar);
drop function if exists update_recycle_table(int4, int4, varchar, int4, varchar, varchar, recycle_type, varchar, varchar);
--crm_org~
drop function if exists delete_crm_org(int4, int4);
drop function if exists delete_crm_org_address(int4, int4);
drop function if exists delete_crm_org_assign(int4, int4);
drop function if exists delete_crm_org_contact(int4, int4);
drop function if exists delete_crm_org_detail(int4, int4);
drop function if exists delete_crm_org_package(int4, int4);
drop function if exists delete_crm_org_source(int4, int4);
drop function if exists insert_crm_org(varchar, varchar, varchar, varchar, varchar, varchar, int4, int4, varchar, int4);
drop function if exists insert_crm_org_address(int4, numeric, address_type, int4);
drop function if exists insert_crm_org_assign(int4, int4, int4);
drop function if exists insert_crm_org_detail(int4, int4, varchar, int4);
drop function if exists insert_crm_org_source(varchar, varchar, int4);
drop function if exists insert_crm_org_contact(int4, varchar, varchar, varchar, varchar, varchar, varchar, int4);
drop function if exists insert_crm_org_package(int4, int4, int4, int4);
drop function if exists update_crm_org(int4, int4, varchar, varchar, varchar, varchar, varchar, varchar, int4, varchar, int4);
drop function if exists update_crm_org_assign(int4, int4, int4, int4);
drop function if exists update_crm_org_detail(int4, int4, int4, int4, varchar);
drop function if exists update_crm_org_source(int4, int4, varchar, varchar);
drop function if exists update_crm_org_address(int4, int4, int4, numeric, address_type);
drop function if exists update_crm_org_contact(int4, int4, int4, varchar, varchar, varchar, varchar, varchar, varchar);
drop function if exists update_crm_org_package(int4, int4, int4, int4, int4);
--crm_org~

DROP FUNCTION IF EXISTS update_audit_table(int4, int4, varchar, int4, recycle_type, varchar, varchar);
DROP FUNCTION IF EXISTS delete_audit_table(int4, int4);
DROP FUNCTION IF EXISTS delete_staff_copy(int4, int4);
DROP FUNCTION IF EXISTS delete_staff_test(int4, int4);
DROP FUNCTION IF EXISTS insert_staff_test(varchar, varchar, varchar, varchar, int4, int4, int4, int4, varchar, gender, varchar, varchar, varchar, timestamp);
DROP FUNCTION IF EXISTS update_staff_test(int4, int4, varchar, varchar, varchar, varchar, int4, int4, int4, varchar, gender, varchar, varchar, varchar, timestamp); 
DROP FUNCTION IF EXISTS update_code_prefix_owner(int4, int4, int4, int4, varchar, int4, int4, int4, int4, varchar);

--EXECUTE-----------------------------------------------------------------------------
select public.automate('{e_request_document_of_cadidate,
        e_request_employment_certificate,e_request_equipment_request_form,
        e_request_use_electronic,e_request_leaveapplicationform,
        e_request_letter_of_resignation,e_request_overtime,
        e_request__price_qoute_chart,e_request_probationary_quiz,
        e_request_requestform,e_request_special_form,e_request_vehicle_usage,
        e_request_working_application,hr_shift,product,audit_table,staff_copy,staff_test
        ,module,module_access
				,invoice_arrival,invoice_arrival_detail,invoice_before_arrival
				,invoice_before_arrival_detail,product,product_brand,product_company
				,product_customer_,product_customer_detail,product_price,product_qty
				,product_type,storage,storage_detail,storage_location,supplier
				}','drop_function');
--EXECUTE-----------------------------------------------------------------------------
--END DROP FUNCTION--------------------------------

--START DROP TABLE----------------------------------
drop table if exists abc;
drop table if exists crm_org;
drop table if exists crm_org_assign;
drop table if exists crm_org_contact;
drop table if exists crm_org_detail;
drop table if exists crm_org_package;
drop table if exists crm_org_renamed;
drop table if exists crm_org_source;
drop table if exists crm_org_address;
drop table if exists key_gazetteers;
drop table if exists recycle_table;
drop table if exists request_product;
drop table if exists request_product_detail;
drop table if exists returned_request;
drop table if exists returned_request_detail;
DROP TABLE IF EXISTS package;
DROP TABLE IF EXISTS service;
DROP TABLE IF EXISTS staff_copy;
DROP TABLE IF EXISTS staff_test;
--END DROP TABLE-----------------------------------

--START ALTER TABLE NAME--------------------------------
-- alter table if exists crm_org_renamed rename to crm_org;
--  alter table if exists crm_org
--  	add COLUMN col_test6 integer UNIQUE,
-- add COLUMN col_test2 integer UNIQUE;
-- alter table if exists crm_org
-- 	rename org_number to col_re_test;
--===stcok==============================================================
--postpone
--===stcok==============================================================
----------------------------------------------------------------
alter table if exists company rename to ma_company;
----------------------------------------------------------------
alter table if exists company_dept rename to ma_company_dept;
alter table if exists ma_company_dept
	rename company_id to ma_company_id;
----------------------------------------------------------------
alter table if exists company_branch rename to ma_company_branch;
alter table if exists ma_company_branch
	rename company_id to ma_company_id;
alter table if exists ma_company_branch
	rename address to apt_number;
alter table if exists ma_company_branch
	add COLUMN street varchar,
	add column home_number varchar,
	add column latlg varchar,
	add column hotline varchar,
	add column gazetteers_code varchar;
----------------------------------------------------------------
alter table if exists company_dept_manager rename to ma_company_dept_manager;
alter table if exists ma_company_dept_manager
	rename position_id to ma_position_id;
alter table if exists ma_company_dept_manager
	rename company_dept_id to ma_company_dept_id;
alter table if exists ma_company_dept_manager
	rename group_id to ma_group_id;
----------------------------------------------------------------
alter table if exists company_detail rename to ma_company_detail;
alter table if exists ma_company_detail
	rename company_id to ma_company_id;
alter table if exists ma_company_detail
	rename branch_id to ma_company_branch_id;
----------------------------------------------------------------
alter table if exists crm_lead 
	rename source_id to crm_lead_source_id;
alter table if exists crm_lead 
	rename company_detail_id to ma_company_detail_id;
alter table if exists crm_lead 
	rename industry_id to crm_lead_industry_id;
----------------------------------------------------------------
alter table if exists crm_lead_assign 
	rename staff_id to ma_user_id;
----------------------------------------------------------------
alter table if exists crm_lead_detail
	rename status_id to crm_status_id;
----------------------------------------------------------------
alter table if exists crm_lead_package rename to crm_lead_items;
alter table if exists crm_lead_items
	rename package_id to stock_product_id;
alter table if exists crm_lead_items
	rename lead_address_id to crm_lead_address_id;
----------------------------------------------------------------
alter table if exists crm_quote 
	rename crm_org_id to crm_lead_id;
alter table if exists crm_quote 
	rename billing_address_id to crm_lead_address_id;
----------------------------------------------------------------
alter table if exists crm_quote_detail 
	rename product_id to stock_product_id;
alter table if exists crm_quote_detail 
	rename measurement_id to ma_measurement_id;
alter table if exists crm_quote_detail 
	rename install_address_id to crm_lead_address_id;
COMMENT ON COLUMN crm_quote_detail.crm_lead_address_id IS 'install address';
alter table if exists crm_quote_detail 
	drop if EXISTS package_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS crm_survey
	DROP IF EXISTS crm_org_address_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS crm_survey_result 
	rename survey_id to crm_survey_id;
----------------------------------------------------------------
alter table if exists currency rename to ma_currency;
ALTER TABLE IF EXISTS ma_currency 
	ADD COLUMN name_kh varchar;
----------------------------------------------------------------
alter table if exists customer rename to ma_customer;
ALTER TABLE IF EXISTS ma_customer 
	ADD COLUMN code integer,
	ADD COLUMN code_prefix_owner_id integer,
	ADD COLUMN ma_company_detail_id integer;
----------------------------------------------------------------
alter table if exists customer_branch rename to ma_customer_branch;
alter table if exists ma_customer_branch
	rename customer_id to ma_customer_id;
alter table if exists ma_customer_branch
	DROP IF EXISTS contact,
	DROP IF EXISTS address;
ALTER TABLE IF EXISTS ma_customer_branch 
	ADD COLUMN code integer,
	ADD COLUMN code_prefix_owner_id integer;
----------------------------------------------------------------
alter table if exists customer_detail rename to ma_customer_detail;
ALTER TABLE IF EXISTS ma_customer_detail 
	rename customer_id to ma_customer_id;
ALTER TABLE IF EXISTS ma_customer_detail 
	RENAME branch_id to ma_customer_branch_id;
--E-request--------------------------------------------------------------
--E-request system is postponed nth to change here 
-- ALTER TABLE IF EXISTS e_request
-- 	RENAME company_dept_id to ma_company_dept_id;
-- ALTER TABLE IF EXISTS e_request
-- 	RENAME company_dept_manager_id to ma_company_dept_manager_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS e_request_probationary_quiz
	RENAME staff_id to ma_user_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS e_request_stand_by_detail
	RENAME staff_id to ma_user_id;
----------------------------------------------------------------
--E-request--------------------------------------------------------------
----------------------------------------------------------------
alter table if exists gazetteers rename to ma_gazetteers;
----------------------------------------------------------------
alter table if exists "group" rename to ma_group;
----------------------------------------------------------------
alter table if exists measurement rename to ma_measurement;
----------------------------------------------------------------
--hr--------------------------------------------------------------
ALTER TABLE IF EXISTS hr_absence
	RENAME staff_id to ma_user_id;
----------------------------------------------------------------
--hr_user to hr_recruitment_candidate//
--hr_user_answer to hr_recruitment_candidate_answer//
--hr_question_type to hr_recruitment_question_type//
--hr_question to hr_recruitment_question//
--hr_question_choice to hr_recruitment_question_choice//
--hr_question_knowledge to hr_recruitment_question_knowledge//
--hr_approval_detail to hr_recruitment_candidate_detail//
--hr_attendance_holiday -> change id pk to auto ic
-- any other hr_~ let they do it themselve
-- hr_mission hr_mission_detail hr_overtime
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_approval_detail RENAME to hr_recruitment_candidate_detail;
ALTER TABLE IF EXISTS hr_recruitment_candidate_detail 
	RENAME hr_user_id to hr_recruitment_candidate_id;
ALTER TABLE IF EXISTS hr_recruitment_candidate_detail
	DROP IF EXISTS action_by;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_user RENAME to hr_recruitment_candidate;
ALTER TABLE IF EXISTS hr_recruitment_candidate 
	RENAME position_id to ma_position_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_user_answer RENAME TO hr_recruitment_candidate_answer;
ALTER TABLE IF EXISTS hr_recruitment_candidate_answer 
	RENAME choice_id to hr_recruitment_question_choice_id;
ALTER TABLE IF EXISTS hr_recruitment_candidate_answer
	RENAME question_id to hr_recruitment_question_id;
ALTER TABLE IF EXISTS hr_recruitment_candidate_answer
	RENAME user_id to hr_recruitment_candidate_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_question RENAME to hr_recruitment_question;
ALTER TABLE IF EXISTS hr_recruitment_question 
	RENAME dapartement_id to ma_company_dept_id;
ALTER TABLE IF EXISTS hr_recruitment_question 
	RENAME question_type_id to hr_recruitment_question_type_id;
ALTER TABLE IF EXISTS hr_recruitment_question
	RENAME position_id to ma_position_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_question_type RENAME to hr_recruitment_question_type;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_question_choice RENAME to hr_recruitment_question_choice;
ALTER TABLE IF EXISTS hr_recruitment_question_choice 
	RENAME question_id to hr_recruitment_question_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_question_knowledge RENAME to hr_recruitment_question_knowledge;
ALTER TABLE IF EXISTS hr_recruitment_question_knowledge
	RENAME dapartement_id to ma_company_dept_id;
------------------------------------------------------------------
ALTER TABLE IF EXISTS hr_attendance_holiday
	ADD COLUMN create_date TIMESTAMP;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_attendance_special_case
	RENAME created_at to create_date;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_mission 
	ADD COLUMN create_date TIMESTAMP;
ALTER TABLE IF EXISTS hr_mission 
-- 	RENAME staff_id to ma_user_id;
ADD COLUMN ma_user_id INTEGER;
--change from staff_id to user_id--------------------------------------------------------------
ALTER TABLE IF EXISTS hr_payroll
	RENAME staff_id to ma_user_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_payroll_add_on
	RENAME staff_id to ma_user_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_payroll_base_salary
	RENAME staff_id to ma_user_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_performance_schedule
	RENAME staff_id to ma_user_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_shift 
	RENAME staff_id to ma_user_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_training_schedule 
	RENAME staff_id to hr_training_trainer_id;
ALTER TABLE IF EXISTS hr_training_schedule 
	DROP IF EXISTS schedule_status;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_training_staff
	RENAME staff_id to ma_user_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS login_detail
	RENAME staff_id to ma_user_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS module_access 
	RENAME staff_id to ma_user_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_mission_detail
	RENAME mission_id to hr_mission_id;
ALTER TABLE IF EXISTS hr_mission_detail 
	RENAME member to ma_user_id;
COMMENT ON COLUMN hr_mission_detail.ma_user_id IS 'member of the mission';
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_payroll_add_on
	RENAME add_on_rule_id to hr_payroll_add_on_rule_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_performance_manager_follow_up
	RENAME score_id to hr_performance_score_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_performance_schedule 
	RENAME plan_detail_id to hr_performance_plan_detail_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_policy_user
	RENAME id_user to ma_user_id;
ALTER TABLE IF EXISTS hr_policy_user
	RENAME id_policy to hr_policy_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_suggestion_answer 
	RENAME question_id to hr_suggestion_question_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_suggestion_question
	RENAME id_type to hr_suggestion_question_type_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_suggestion_submited
	RENAME question_id to hr_suggestion_question_id;
ALTER TABLE IF EXISTS hr_suggestion_submited
	RENAME answer_id to hr_suggestion_answer_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_training
	RENAME training_schedule_id to hr_training_schedule_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_training_schedule 
	RENAME training_list_id to hr_training_list_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS hr_late_staff RENAME to hr_attendance_late_staff;
ALTER TABLE IF EXISTS hr_attendance_late_staff
	ADD COLUMN ma_user_id INTEGER;
----------------------------------------------------------------
--hr--------------------------------------------------------------
----------------------------------------------------------------
alter table if exists "module" rename to ma_module;
----------------------------------------------------------------
alter table if exists module_access rename to ma_module_access;
ALTER TABLE IF EXISTS ma_module_access
	RENAME module_id to ma_module_id;
ALTER TABLE IF EXISTS ma_module_access
	RENAME position_id to ma_position_id;
ALTER TABLE IF EXISTS ma_module_access
	RENAME group_id to ma_group_id;
ALTER TABLE IF EXISTS ma_module_access
	RENAME company_dept_id to ma_company_dept_id;
----------------------------------------------------------------
alter table if exists "position" rename to ma_position;
ALTER TABLE IF EXISTS ma_position
	RENAME group_id to ma_group_id;
----------------------------------------------------------------
alter table if exists staff rename to ma_user;
ALTER TABLE IF EXISTS ma_user
	RENAME position_id to ma_position_id;
ALTER TABLE IF EXISTS ma_user
	RENAME company_dept_id to ma_company_dept_id;
ALTER TABLE IF EXISTS ma_user
	RENAME company_detail_id to ma_company_detail_id;
update ma_user set email='testting@staff.com' where id=262;
update ma_user set email= null where id=198 or id=300 or id=296;
update ma_user set email= null where email='';
ALTER TABLE IF EXISTS public.ma_user
    ADD CONSTRAINT ma_user_email_unqi UNIQUE (email);
----------------------------------------------------------------
alter table if exists staff_detail rename to ma_user_detail;
ALTER TABLE IF EXISTS ma_user_detail 
	RENAME staff_id to ma_user_id;
----------------------------------------------------------------
ALTER TABLE IF EXISTS login_detail rename to ma_user_login_detail;
alter table if exists taxation rename to ma_taxation;
alter table if exists taxation_detail rename to ma_taxation_detail;
--------------------------------------------------------------------
ALTER TABLE IF EXISTS main_app_commission rename to ma_commission;
ALTER TABLE IF EXISTS ma_commission 
	RENAME commission_team_id to ma_commission_team_id;
ALTER TABLE IF EXISTS ma_commission 
	RENAME currency_id to ma_currency;
--------------------------------------------------------------------
ALTER TABLE IF EXISTS main_app_commission_team rename to ma_commission_team;
--------------------------------------------------------------------
ALTER TABLE IF EXISTS main_app_currency_rate rename to ma_currency_rate;
--------------------------------------------------------------------
ALTER TABLE IF EXISTS code_prefix_owner
	RENAME company_detail_id to ma_company_detail_id;
--------------------------------------------------------------------
--END ALTER TABLE NAME-----------------------------------

--CREATE FUNCTION---------------------------------------------------------------
CREATE OR REPLACE FUNCTION public.insert_user(
	nname character varying,
	nemail character varying,
	ncontact character varying,
	naddress character varying,
	nposition_id integer,
	ncompany_id integer,
	ncompany_branch_id integer,
	ncompany_dept_id integer,
	ncreate_by integer,
	nid_number character varying,
	nsex gender,
	nname_kh character varying,
	nimage character varying,
	noffice_phone character varying,
	njoin_date timestamp without time zone)
    RETURNS integer
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
    
AS $BODY$
declare last_id integer;
declare l integer;
declare ncompany_detail_id integer:=(select id from ma_company_detail where ma_company_branch_id=ncompany_branch_id and ma_company_id=ncompany_id);
declare nicode integer;
declare cpo_id integer;
declare ROW_OLD text;
declare ROW_NEW text;
BEGIN
SELECT public.get_table_val('ma_user',0) into ROW_OLD;
SELECT * into cpo_id,nicode from public.get_code_ibuild(ncompany_detail_id,3,null);
INSERT INTO public.ma_user(
	name, email, contact, address, position_id, ma_company_detail_id, ma_company_dept_id, create_date, create_by, id_number, sex, name_kh, image, office_phone, join_date,icode,code_prefix_owner_id,is_deleted,status)
		VALUES (nname, nemail, ncontact, naddress, nposition_id, ncompany_detail_id, ncompany_dept_id, (select now()), ncreate_by, nid_number, nsex, nname_kh, nimage, noffice_phone, njoin_date,nicode,cpo_id,'f','t') returning id into last_id;
		SELECT public.get_code_prefix_update(cpo_id) into l;
		
		SELECT public.get_table_val('ma_user',last_id) into ROW_NEW;
                        SELECT public.insert_audit_table(
                            'ma_user',
                            last_id,
                            ncreate_by,
                            'insert',
                            ROW_OLD,
                            ROW_NEW
                        ) into l;
		
		return last_id;
END
$BODY$;
------------------------------------------------------------------------------------------------------------------
DROP FUNCTION IF EXISTS public.update_staff_img(integer, character varying);

CREATE OR REPLACE FUNCTION public.update_user_img(
	nuser_id integer,
	nimg character varying)
    RETURNS integer
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
    
AS $BODY$
declare l integer;
                declare last_id integer;
                declare ROW_OLD text;
                declare ROW_NEW text;
BEGIN
SELECT public.get_table_val('ma_user',nuser_id) into ROW_OLD;
	UPDATE public."ma_user"
	SET image=nimg
	WHERE id=nuser_id;
	SELECT public.get_table_val('ma_user',nuser_id) into ROW_NEW;
                        SELECT public.insert_audit_table(
                            'ma_user',
                            nuser_id,--update id
                            nuser_id,
                            'update',
                            ROW_OLD,
                            ROW_NEW
                        ) into l;
	return nuser_id;
END
$BODY$;
--------------------------------------------------------------------------------------------------------
DROP FUNCTION IF EXISTS public.update_staff_shift(integer, integer, integer);

CREATE OR REPLACE FUNCTION public.update_user_shift(
	nuser_id integer,
	nposition_id integer,
	nupdate_by integer)
    RETURNS integer
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
    
AS $BODY$
declare l integer;
                declare last_id integer;
                declare ROW_OLD text;
                declare ROW_NEW text;
BEGIN
SELECT public.get_table_val('ma_user',nuser_id) into ROW_OLD;
	UPDATE public."ma_user"
                    SET ma_position_id=nposition_id 
					WHERE id=nuser_id;
	SELECT public.get_table_val('ma_user',nuser_id) into ROW_NEW;
                        SELECT public.insert_audit_table(
                            'ma_user',
                            nuser_id,-- update id
                            nupdate_by,
                            'insert',
                            ROW_OLD,
                            ROW_NEW
                        ) into l;
	return nuser_id;
END
$BODY$;
--------------------------------------------------------------------
DROP FUNCTION IF EXISTS public.insert_hr_shift(integer, integer, numeric, integer, text);

CREATE OR REPLACE FUNCTION public.insert_hr_shift(
	nstaff_id integer,
	nposition_id integer,
	nsalary numeric,
	ncreate_by integer,
	ncomment text)
    RETURNS integer
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
    
AS $BODY$
declare last_id integer;
				declare l integer;
				declare ROW_OLD text;
                declare ROW_NEW text;
            BEGIN
				SELECT public.get_table_val('hr_shift',0) into ROW_OLD;
                INSERT INTO public."hr_shift"(ma_user_id,position_id,salary,create_date,create_by,comment,status,is_deleted)
                    VALUES (nstaff_id,nposition_id,nsalary,(select now()),ncreate_by,ncomment,'t','f') returning id into last_id;
					
					SELECT public.get_table_val('hr_shift',last_id) into ROW_NEW;
                        SELECT public.insert_audit_table(
                            'hr_shift',
                            last_id,
                            ncreate_by,
                            'insert',
                            ROW_OLD,
                            ROW_NEW
                        ) into l;
					
					SELECT public.update_user_shift(
						nstaff_id, 
						nposition_id, 
						ncreate_by
					) into l;
					SELECT public.insert_hr_payroll_base_salary(
						nstaff_id, 
						null, 
						nsalary, 
						null, 
						ncreate_by
					) into l;
                    return last_id;
            END
$BODY$;
--------------------------------------------------------------------
DROP FUNCTION IF EXISTS public.insert_logout_detail(integer);
CREATE OR REPLACE FUNCTION public.insert_logout_detail(
	nuser_id integer)
    RETURNS integer
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
    
AS $BODY$
declare last_id integer;
BEGIN
	INSERT INTO public.login_detail(
	ma_user_id, create_date, action_type)
		VALUES (nuser_id,(select now()),'sign_out') returning id into last_id;
		return last_id;
END
$BODY$;

DROP FUNCTION IF EXISTS public.insert_login_detail(integer);
CREATE OR REPLACE FUNCTION public.insert_login_detail(
	nuser_id integer)
    RETURNS integer
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
    
AS $BODY$
declare last_id integer;
BEGIN
	INSERT INTO public.ma_user_login_detail(
	ma_user_id, create_date, action_type)
		VALUES (nuser_id,(select now()),'sign_in') returning id into last_id;
		return last_id;
END
$BODY$;
---------------------------------------------------------------------
DROP FUNCTION IF EXISTS public.exec_get_position(integer);

CREATE OR REPLACE FUNCTION public.exec_get_position(
	nstaff_id integer)
    RETURNS integer
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
    
AS $BODY$
declare last_id integer;
BEGIN
select ma_position_id into last_id from "ma_user" where id=nstaff_id;
		return last_id;
END
$BODY$;
---------------------------------------------------------------------
DROP FUNCTION IF EXISTS public.exec_block_staff(integer, integer, character varying);

CREATE OR REPLACE FUNCTION public.exec_block_user(
	nuser_id integer,
	nupdate_by integer,
	ndescription character varying)
    RETURNS integer
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
    
AS $BODY$
declare l integer;
                declare last_id integer;
                declare ROW_OLD text;
                declare ROW_NEW text;
BEGIN
SELECT public.get_table_val('ma_user',nuser_id) into ROW_OLD;
	--update now
	UPDATE public."ma_user_detail"
		SET status='f'
	WHERE ma_user_id=nuser_id;
	--end
	SELECT public.get_table_val('ma_user',nuser_id) into ROW_NEW;
                        SELECT public.insert_audit_table(
                            'ma_user',
                            nuser_id,
                            nupdate_by,
                            'insert',
                            ROW_OLD,
                            ROW_NEW
                        ) into l;
	return nuser_id;
END
$BODY$;
------------------------------------------------------------------------
DROP FUNCTION IF EXISTS public.exec_change_password(integer, character varying);

CREATE OR REPLACE FUNCTION public.exec_change_password(
	nuser_id integer,
	npassword character varying)
    RETURNS integer
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
    
AS $BODY$
declare last_id integer;
declare l integer;
                declare ROW_OLD text;
                declare ROW_NEW text;
BEGIN
SELECT public.get_table_val('ma_user_detail',nuser_id) into ROW_OLD;
	--update now
	UPDATE public."ma_user_detail"
		SET password=npassword
	WHERE ma_user_id=nuser_id;
	--end
	SELECT public.get_table_val('ma_user_detail',nuser_id) into ROW_NEW;
                        SELECT public.insert_audit_table(
                            'ma_user_detail',
                            nuser_id,--update id
                            nuser_id,
                            'insert',
                            ROW_OLD,
                            ROW_NEW
                        ) into l;
	return nuser_id;
END
$BODY$;
------------------------------------------------------------------------
DROP FUNCTION IF EXISTS public.exec_check_password(character varying, character varying);

CREATE OR REPLACE FUNCTION public.exec_check_password(
	nemail character varying,
	npassword character varying)
    RETURNS integer
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
    
AS $BODY$
declare last_id integer;
	declare stat boolean;
	declare l integer;
BEGIN
select sd.ma_user_id,sd.status into last_id,stat from "ma_user_detail" sd 
join ma_user s on s.id=sd.ma_user_id
where s.email=nemail and sd.password=npassword;
if last_id is not null then
	if stat='f' then
		last_id=0;
	else
		SELECT public.insert_login_detail(
			last_id
		) into l;
	end if;
else 
	last_id=-1;
end if;	
	return last_id;
END
$BODY$;
------------------------------------------------------------------------
DROP FUNCTION IF EXISTS public.exec_check_password_main_app(character varying, character varying);
------------------------------------------------------------------------
DROP FUNCTION IF EXISTS public.exec_check_position(character varying, integer);

CREATE OR REPLACE FUNCTION public.exec_check_position(
	nmodule_code character varying,
	nuser_id integer)
    RETURNS integer
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
    
AS $BODY$
declare last_id integer;
	declare pos integer;
	declare dept integer;
	declare grp integer;
	declare nmodule_id integer:=(select id from ma_module where code=nmodule_code);
BEGIN
	select s.ma_position_id,s.ma_company_dept_id,(select ma_group_id from ma_position where id=s.ma_position_id) 
		into pos,dept,grp
		from ma_user s where s.id=nuser_id;
	select id into last_id from ma_module_access 
		where 't' and status='t' and (ma_group_id=grp 
			and ma_position_id=pos and ma_company_dept_id=dept and ma_module_id=nmodule_id) 
			or (ma_user_id=nuser_id and status = 't')
			or (ma_position_id is null and ma_group_id is null and ma_company_dept_id is null and ma_user_id is not null and ma_module_id=nmodule_id and status = 't');
		return last_id;
END
$BODY$;
------------------------------------------------------------------------
DROP FUNCTION IF EXISTS public.exec_get_access_module_of(integer, character varying);
DROP FUNCTION IF EXISTS public.exec_get_access_module(integer);
CREATE OR REPLACE FUNCTION public.exec_get_access_module_of(
	nuser_id integer,
	nmodule_code character varying)
    RETURNS TABLE(module_id integer, module_name character varying, link character varying, icon character varying, sequence integer, code character varying) 
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
    ROWS 1000
    
AS $BODY$
declare last_id integer;
	declare pos integer;
	declare dept integer;
	declare grp integer;
	declare nmodule_id integer:=(select m.id from ma_module m where m.code=nmodule_code);
BEGIN
	select s.ma_position_id,s.ma_company_dept_id,(select ma_group_id from "ma_position" where id=s.ma_position_id) 
		into pos,dept,grp
		from ma_user s where s.id=nuser_id;
	
	if nmodule_code is null then
		return query select distinct m.id,m.name,m.link,m.icon,m.sequence,m.code from ma_module_access ma 
		join ma_module m on m.id=ma.ma_module_id 
		where 't' and ma.status='t' and m.is_show='t' and m.status='t' and parent_id is null and(ma_group_id=grp 
			and ma.ma_position_id=pos  
			and (select case when ma.ma_company_dept_id is null then 0 else ma.ma_company_dept_id end)=(select case when dept is null then 0 else dept end)) 
			or (ma.ma_user_id=nuser_id and ma.status='t' and m.is_show='t' and m.status='t' and parent_id is null)
			or (ma.ma_position_id is null and ma.ma_user_id is null and ma.ma_company_dept_id is null and ma.ma_group_id is null and m.is_show='t' and ma.status='t' and m.is_show='t' and m.status='t' and parent_id is null)
			order by m.sequence;
	else
		return query select distinct m.id,m.name,m.link,m.icon,m.sequence,m.code from ma_module_access ma 
		join ma_module m on m.id=ma.ma_module_id 
		where 't' and ma.status='t' and m.is_show='t' and parent_id=nmodule_id and(ma_group_id=grp 
			and ma.ma_position_id=pos 
			and (select case when ma.ma_company_dept_id is null then 0 else ma.ma_company_dept_id end)=(select case when dept is null then 0 else dept end)) 
			or (ma.ma_user_id=nuser_id and ma.status='t' and m.is_show='t' and m.status='t' and parent_id=nmodule_id)
			or (ma.ma_position_id is null and ma.ma_user_id is null and ma.ma_company_dept_id is null and ma.ma_group_id is null and m.is_show='t' and ma.status='t' and m.is_show='t' and m.status='t' and parent_id=nmodule_id)
			order by m.sequence;
	end if ;
END
$BODY$;
------------------------------------------------------------------------
DROP FUNCTION IF EXISTS public.get_code_ibuild(integer, integer, integer);

CREATE OR REPLACE FUNCTION public.get_code_ibuild(
	nma_company_detail_id integer,
	ncode_prefix_id integer,
	n_id integer)
    RETURNS TABLE(code_prefix_owner_id integer, code integer) 
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
    ROWS 1000
    
AS $BODY$
declare ncode character varying;
	declare cpo_id integer;
	declare ncurrent_code integer;
	declare nowner_prefix character VARYING:=(select cb.code from company_branch cb where id=(select ma_company_branch_id from ma_company_detail where id=nma_company_detail_id));

BEGIN
		SELECT * into cpo_id,ncurrent_code from public.get_code_prefix(nma_company_detail_id,ncode_prefix_id,n_id);
		ncurrent_code=ncurrent_code+1;
		return query 
			select cpo_id,ncurrent_code;
END
$BODY$;
------------------------------------------------------------------------
DROP FUNCTION IF EXISTS public.get_code_prefix(integer, integer, integer);

CREATE OR REPLACE FUNCTION public.get_code_prefix(
	nma_company_detail_id integer,
	ncode_prefix_id integer,
	n_id integer)
    RETURNS TABLE(code_prefix_owner_id integer, current_code integer, format character varying, code_prefix character varying) 
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
    ROWS 1000
    
AS $BODY$
declare last_id integer;
BEGIN
		
		if nma_company_detail_id is null then 
			if n_id is not null then 
				return query 
				select cpo.id,cpo.current_value,cpo.format,cp.prefix
					from code_prefix_owner cpo 
					join code_prefix cp on cp.id=cpo.code_prefix_id
				where cpo.status='t' AND cp.status='t'
					and cpo.ma_company_detail_id is null and _id=n_id and  cpo.code_prefix_id=ncode_prefix_id limit 1;
			else 
				return query 
				select cpo.id,cpo.current_value,cpo.format,cp.prefix
					from code_prefix_owner cpo 
					join code_prefix cp on cp.id=cpo.code_prefix_id
				where cpo.status='t' AND cp.status='t'
					and cpo.ma_company_detail_id is null and _id is null and cpo.code_prefix_id=ncode_prefix_id limit 1;
			end if;
		else 
			if n_id is not null then 
				return query 
				select cpo.id,cpo.current_value,cpo.format,cp.prefix
					from code_prefix_owner cpo 
					join code_prefix cp on cp.id=cpo.code_prefix_id
				where cpo.status='t' AND cp.status='t'
					and cpo.ma_company_detail_id=nma_company_detail_id and _id=n_id and cpo.code_prefix_id=ncode_prefix_id limit 1;
			else
				return query 
				select cpo.id,cpo.current_value,cpo.format,cp.prefix
					from code_prefix_owner cpo 
					join code_prefix cp on cp.id=cpo.code_prefix_id
				where cpo.status='t' AND cp.status='t'
					and cpo.ma_company_detail_id=nma_company_detail_id and _id is null and cpo.code_prefix_id=ncode_prefix_id limit 1;
			end if;
		end if;
END
$BODY$;
------------------------------------------------------------------------
 DROP FUNCTION IF EXISTS public.get_code_prefix_ibuild(integer, integer, integer, integer);

CREATE OR REPLACE FUNCTION public.get_code_prefix_ibuild(
	nvalue integer,
	nma_company_detail_id integer,
	ncode_prefix_owner_id integer,
	nparent_code integer)
    RETURNS character varying
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
    
AS $BODY$
declare pcode character varying;
	declare nprefix character varying:=(select prefix from code_prefix cp join code_prefix_owner cpo on cpo.code_prefix_id=cp.id where cpo.id=ncode_prefix_owner_id);
	declare nformat character varying:=(select format from code_prefix_owner where id=ncode_prefix_owner_id);
	declare npar_format character varying:=(select format from code_prefix_owner where id=(select parent_id from code_prefix_owner where id=ncode_prefix_owner_id));
	declare nowner_prefix character varying:=(select public.get_code_prefix_owner_ibuild(nma_company_detail_id));
BEGIN
		if length(nprefix)>0 then
			pcode=nprefix;
			if nparent_code is not null and nparent_code>0 and (npar_format is not null and length(npar_format)>0) then
				pcode=pcode||'-'||to_char(nparent_code,npar_format);
			end if;
			
			if nowner_prefix is not null and length(nowner_prefix)>0 then
				pcode=nowner_prefix||'-'||pcode;
			end if;
			pcode=pcode||'-'||to_char(nvalue, nformat);
			pcode=replace(pcode ,' ','');
		else
			pcode=to_char(nvalue, nformat);
			pcode=replace(pcode ,' ','');
			if  nparent_code is not null and nparent_code>0 and (npar_format is not null and length(npar_format)>0) then
				pcode=to_char(nparent_code,npar_format)||'-'||pcode;
				pcode=replace(pcode ,' ','');
			end if;
		end if;
		return pcode;
END
$BODY$;
------------------------------------------------------------------------
DROP FUNCTION IF EXISTS public.get_code_prefix_owner_ibuild(integer);

CREATE OR REPLACE FUNCTION public.get_code_prefix_owner_ibuild(
	nma_company_detail_id integer)
    RETURNS character varying
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
    
AS $BODY$
declare pcode character varying;
	declare nowner_prefix integer:=(select cb.code from ma_company_branch cb where id=(select ma_company_branch_id from ma_company_detail where id=nma_company_detail_id));
	declare nowner_format character varying:=(select format from code_prefix_owner where id=(select code_prefix_owner_id from company_branch where id=(select ma_company_branch_id from ma_company_detail where id=ncompany_detail_id)));
	declare nowner character varying:=(select code from ma_company where id =(select ma_company_id from ma_company_detail where id=ncompany_detail_id));
BEGIN
			if nowner_prefix is not null and nowner_prefix>0 then
				pcode=to_char(nowner_prefix, nowner_format);
			end if;
			pcode=nowner||'-'||pcode;
			pcode=replace(pcode ,' ','');
		
		return pcode;
END
$BODY$;
------------------------------------------------------------------------
DROP FUNCTION IF EXISTS public.get_dept_manager(integer);

CREATE OR REPLACE FUNCTION public.get_dept_manager(
	nuser_id integer)
    RETURNS integer
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
    
AS $BODY$
declare last_id integer;
		declare dm integer;
		DECLARE pos integer;
		DECLARE dept integer;
		DECLARE "t" management_type ;
BEGIN
	select "ma_position_id",ma_company_dept_id into pos,dept FROM ma_user WHERE id=nuser_id;
	select id,type into dm,t from ma_company_dept_manager where ma_position_id =pos and ma_company_dept_id=dept;
	if dm is null then 
		select id into dm from ma_company_dept_manager where ma_company_dept_id=dept and type='mid';
	else 
		if t!='normal' then 
			select cdm.id into dm from ma_company_dept_manager cdm join ma_company_dept cd on cdm.company_dept_id=cd.id  
			where cd.company_id=(select cd.ma_company_id from ma_user s join ma_company_detail cd on cd.id=s.ma_company_detail_id where s.id=nuser_id) 
			and cdm.type='top';
		else 
			select id into dm from ma_company_dept_manager where ma_company_dept_id=dept and type='mid';
		end if;
	end if;
	return dm;
END
$BODY$;
------------------------------------------------------------------------
DROP FUNCTION IF EXISTS public.insert_code_prefix_owner_child(integer, integer, integer);

CREATE OR REPLACE FUNCTION public.insert_code_prefix_owner_child(
	nparent_id integer,
	n_id integer,
	ncreate_by integer)
    RETURNS integer
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
    
AS $BODY$
declare last_id integer;
				declare child_id integer:=(select id from code_prefix_owner where parent_id=nparent_id and _id=n_id limit 1);
				declare ROW_OLD text;
                declare ROW_NEW text;
				declare l integer;
            BEGIN
			SELECT public.get_table_val('code_prefix_owner',0) into ROW_OLD;
				if child_id is not null and child_id>0 then
					update code_prefix_owner set status='f' where parent_id=nparent_id and _id=n_id;
				end if;
                INSERT INTO public."code_prefix_owner"(code_prefix_id,ma_company_detail_id,format,min_value,current_value,create_by,create_date,status,_id,parent_id,is_deleted)
                    select code_prefix_id,ma_company_detail_id,child_format,0,0,(select ncreate_by),(select now()),'t',(select n_id),id,'f' from code_prefix_owner where id=nparent_id returning id into last_id;
                    
					SELECT public.get_table_val('code_prefix_owner',last_id) into ROW_NEW;
                        SELECT public.insert_audit_table(
                            'code_prefix_owner',
                            last_id,
                            ncreate_by,
                            'insert',
                            ROW_OLD,
                            ROW_NEW
                        ) into l;
					return last_id;
            END
$BODY$;
------------------------------------------------------------------------
DROP FUNCTION IF EXISTS public.drop_fk_constraint(character varying);

CREATE OR REPLACE FUNCTION public.drop_fk_constraint(
	ntable_name character varying)
    RETURNS void
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
    
AS $BODY$
declare r record;
BEGIN
if ntable_name is not null then 
	for r in (select * from information_schema.table_constraints where table_schema = 'public' and table_name=ntable_name and constraint_type='FOREIGN KEY') loop
	  raise info '%','dropping '||r.constraint_name;
	  execute CONCAT('ALTER TABLE "public"."'||ntable_name||'" DROP CONSTRAINT '||r.constraint_name);
  end loop;
else
 	for r in (select * from information_schema.table_constraints where table_schema = 'public' and constraint_type='FOREIGN KEY') loop
	  raise info '%','dropping '||r.constraint_name;
	  execute CONCAT('ALTER TABLE "public"."'||r.table_name||'" DROP CONSTRAINT '||r.constraint_name);
  	end loop;
 end if;

            END
$BODY$;
------------------------------------------------------------------------
DROP FUNCTION IF EXISTS public.insert_module(character varying, integer, character varying, character varying, integer, boolean, integer);

CREATE OR REPLACE FUNCTION public.insert_ma_module(
	nname character varying,
	nparent_id integer,
	nlink character varying,
	nicon character varying,
	nsequence integer,
	nis_show boolean,
	ncreate_by integer)
    RETURNS integer
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
AS $BODY$
declare l integer;
                declare last_id integer;
                declare ROW_OLD text;
                declare ROW_NEW text;
				declare cc integer;
				declare ncode integer;
				declare pcode character varying;
            BEGIN
			if nparent_id is null then 
				select max(case when icode is null then 0 else icode end ) into cc from ma_module where parent_id is null;
				ncode=(select case when cc is null then 0 else cc end)+1;
				pcode=to_char(ncode, '00');
				pcode=replace(pcode ,' ','');
			else
				select max(case when icode is null then 0 else icode end) into cc from ma_module where parent_id=nparent_id;
				ncode=(select case when cc is null then 0 else cc end)+1;
				pcode=(select code from ma_module where id=nparent_id)||to_char(ncode, '00');
				pcode=replace(pcode ,' ','');
			end if;
            SELECT public.get_table_val('ma_module',0) into ROW_OLD;
                INSERT INTO public."ma_module"(name,parent_id,status,link,icon,sequence,is_show,code,icode,is_deleted,create_by)
                    VALUES (nname,nparent_id,'t',nlink,nicon,nsequence,nis_show,pcode,ncode,'f',ncreate_by) returning id into last_id;
                        SELECT public.get_table_val('ma_module',last_id) into ROW_NEW;
                        SELECT public.insert_audit_table(
                            'ma_module',
                            last_id,
                            ncreate_by,
                            'insert',
                            ROW_OLD,
                            ROW_NEW
                        ) into l;
                    return last_id;
            END
$BODY$;
------------------------------------------------------------------------
DROP FUNCTION IF EXISTS public.insert_module_access(integer, integer, integer, integer, integer, integer);

CREATE OR REPLACE FUNCTION public.insert_ma_module_access(
	nmodule_id integer,
	nposition_id integer,
	ngroup_id integer,
	ncompany_dept_id integer,
	nuser_id integer,
	ncreate_by integer)
    RETURNS integer
    LANGUAGE 'plpgsql'

    COST 100
    VOLATILE 
AS $BODY$
declare l integer;
                declare last_id integer;
                declare ROW_OLD text;
                declare ROW_NEW text;
            BEGIN
            SELECT public.get_table_val('ma_module_access',0) into ROW_OLD;
                INSERT INTO public."ma_module_access"(ma_module_id,ma_position_id,ma_group_id,ma_company_dept_id,status,ma_user_id,is_deleted,create_by)
                    VALUES (nmodule_id,nposition_id,ngroup_id,ncompany_dept_id,'t',nuser_id,'f',ncreate_by) returning id into last_id;
                        SELECT public.get_table_val('ma_module_access',last_id) into ROW_NEW;
                        SELECT public.insert_audit_table(
                            'ma_module_access',
                            last_id,
                            ncreate_by,
                            'insert',
                            ROW_OLD,
                            ROW_NEW
                        ) into l;
                    return last_id;
            END
$BODY$;
------------------------------------------------------------------------
------------------------------------------------------------------------
--CREATE FUNCTION---------------------------------------------------------------
--EXCUTE FUNCTION------------------------------------------------------
SELECT public.drop_fk_constraint(null);
DROP FUNCTION IF EXISTS public.drop_fk_constraint(character varying);
select public.automate(null,'relationship');
DROP FUNCTION IF EXISTS public.automate(nignore character varying,nmode varchar);
--EXCUTE FUNCTION------------------------------------------------------
