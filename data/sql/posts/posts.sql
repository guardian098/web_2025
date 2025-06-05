INSERT INTO 
    post (
        user_id,
        title,
        subtitle, 
        img_1,
        img_2,
        img_3, 
        posted_at,
        likes
    ) 
VALUES (
    1,
    'Так красиво сегодня на улице! Настоящая зима)) ', 
    '',
    '../image/post_1_img.jfif',
    '',
    '',
    FROM_UNIXTIME(1733961600),
    1   
),
(
    2,
    'Второй пост', 
    'Красивая картинка',
    '../image/post_2_img.jfif',
    '',
    '',
    FROM_UNIXTIME(1734961600),
    2
),
(
    1,
    'Красивое небо',
    '',
    '../image/sky_img.jfif',
    '',
    '',
    FROM_UNIXTIME(1733951600)
),
(
    4,
    'Четвертый пост', 
    'Снова красивая картинка',
    '../image/post_2_img.jfif',
    FROM_UNIXTIME(1634961600),
    3
)
