
-- Test the Semester Package
set transaction name 'test_p_semester';

begin
    dbms_output.put_line('3 ==> ' || p_semester.from_date(to_date('2022/11/05')));
end;
/

begin
    dbms_output.put_line('Winter ==> ' || p_semester.to_str(1));
end;
/

declare
    sd date;
    ed date;
begin
    p_semester.get_range(2019, 1, sd, ed);
    dbms_output.put_line('2019/01/01 ==> ' || sd);
    dbms_output.put_line('2019/04/30 ==> ' || ed);
end;
/

commit;
