# Naming

## Views

Views should be prefixed with `v_`.

Remember, when in doubt, you can use phpMyAdmin to view the View's structure.

### Column Names

Enum tables use their table named. For example, `student` has a `degree_id` field,
which would just be named `degree` in `v_student`.

### View Column Prefixes

If the relationship is a `is a` relationship, then the name remains the same.  
Else, the column is prefixed with the name of the table and an underscore.

For example, an `advisor` is a `staff` member, so to get the advisors first name from
a view, you would type `v_advisor.fname`.  
In contrast, a `student` has an `advisor`, so to get the advisors first name from a
view, you would type `v_student.advisor_fname`.

Also worth noting, if there's a specific role a table plays in a relationship with
a table, the prefix will still be the table name, not the role name.  
For example, a `residencehall` has a manager, who is a staff member, but even
though they are a manager, you would still access their first name
as `v_residencehall.staff_fname`.
