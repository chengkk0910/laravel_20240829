INSERT INTO
    `students` (
        `id`,
        `name`,
        `mobile`,
        `created_at`,
        `updated_at`
    )
VALUES
    (NULL, 'amy', '0911-111-111', NULL, NULL),
    (NULL, 'bob', '0922-222-222', NULL, NULL),
    (NULL, 'cat', '0933-333-333', NULL, NULL);



-- $users = DB::table('users')
--                 ->where('votes', '=', 100)
--                 ->where('age', '>', 35)
--                 ->get();


SELECT * FROM students WHERE 'id' = 10;

SELECT * FROM users WHERE 'votes' = 100 AND 'age' > 35 ;