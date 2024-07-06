SELECT p.*
FROM (
    SELECT
        pt.id,
        uu.username,
        CASE
            WHEN uc.middle_name IS NOT NULL THEN (
                uc.first_name || ' ' || uc.middle_name || ' ' || uc.last_name
            )
            ELSE (uc.first_name || ' ' || uc.last_name)
        END AS full_name,
        u.uid || up.ms || up.extension as profile,
        pt.content,
        '[' || GROUP_CONCAT('{"image":"' || pii.image || '","status":"' || pii.status || '"}') || ']' AS images,
        IFNULL(ps.post_type, '0') AS post_type,
        IFNULL(ps.react_type, '0') AS react_type,
        IFNULL(ps.comment_type, '0') AS comment_type,
        IFNULL(pr.tl, '0') AS total_likes,
        IFNULL(pc.tc, '0') AS total_comment
    FROM posts AS pt
        LEFT JOIN users AS u ON pt.author_id = u.id
        LEFT JOIN user_credentials AS uc ON pt.author_id = uc.user_id
        LEFT JOIN user_username AS uu ON pt.author_id = uu.user_id
        LEFT JOIN user_profile AS up ON pt.author_id = up.user_id
        LEFT JOIN post_image AS pii ON pt.id = pii.post_id
        LEFT JOIN post_setting AS ps ON pt.id = ps.post_id
        LEFT JOIN post_tag AS pg ON pt.id = pg.post_id
        LEFT JOIN interest AS i ON u.id = i.user_id
        LEFT JOIN (
            SELECT
                post_id,
                SUM(post_id) AS tl
            FROM
                post_react
            GROUP BY
                post_id
        ) pr ON pt.id = pr.post_id
        LEFT JOIN (
            SELECT
                post_id,
                SUM(post_id) AS tc
            FROM
                post_comment
            GROUP BY
                post_id
        ) pc ON pt.id = pc.post_id
        INNER JOIN follows fs ON fs.follower_id = pt.author_id
    WHERE fs.follower_id = 1
    AND EXISTS (
        SELECT 1
        FROM interest ui
        WHERE ui.user_id = u.id
        AND pg.keyword LIKE '%' || ui.keyword || '%'
    )
    GROUP BY pt.id, uu.username, full_name, pt.content, u.uid, up.ms, up.extension
    LIMIT 10
) AS p


SELECT p.*
FROM (
    SELECT
        pt.id,
        uu.username,
        CASE
            WHEN uc.middle_name IS NOT NULL THEN (
                uc.first_name || ' ' || uc.middle_name || ' ' || uc.last_name
            )
            ELSE (uc.first_name || ' ' || uc.last_name)
        END AS full_name,
        u.uid || up.ms || up.extension as profile,
        pt.content,
        '[' || GROUP_CONCAT('{"image":"' || pii.image || '","status":"' || pii.status || '"}') || ']' AS images,
        IFNULL(ps.post_type, '0') AS post_type,
        IFNULL(ps.react_type, '0') AS react_type,
        IFNULL(ps.comment_type, '0') AS comment_type,
        IFNULL(pr.tl, '0') AS total_likes,
        IFNULL(pc.tc, '0') AS total_comment
    FROM posts AS pt
        LEFT JOIN users AS u ON pt.author_id = u.id
        LEFT JOIN user_credentials AS uc ON pt.author_id = uc.user_id
        LEFT JOIN user_username AS uu ON pt.author_id = uu.user_id
        LEFT JOIN user_profile AS up ON pt.author_id = up.user_id
        LEFT JOIN post_image AS pii ON pt.id = pii.post_id
        LEFT JOIN post_setting AS ps ON pt.id = ps.post_id
        LEFT JOIN post_tag AS pg ON pt.id = pg.post_id
        LEFT JOIN (
            SELECT
                post_id,
                SUM(post_id) AS tl
            FROM
                post_react
            GROUP BY
                post_id
        ) pr ON pt.id = pr.post_id
        LEFT JOIN (
            SELECT
                post_id,
                SUM(post_id) AS tc
            FROM
                post_comment
            GROUP BY
                post_id
        ) pc ON pt.id = pc.post_id
        INNER JOIN follows fs ON fs.follower_id = pt.author_id
    WHERE pt.id = 1
    GROUP BY pt.id, uu.username, full_name, pt.content, u.uid, up.ms, up.extension
    LIMIT 10
) AS p

SELECT
  p.*
FROM
  (
    SELECT
      pt.author_id,
      pt.id,
      pe.image,
      ps.post_type,
      pe.status AS censored,
      COUNT(pe.image) AS total_count,
      pt.created_at
    FROM
      posts AS pt
      LEFT JOIN post_image AS pe ON pt.id = pe.post_id
      LEFT JOIN post_setting AS ps ON pt.id = ps.post_id
    WHERE
      pt.author_id = 1
    GROUP BY
      pt.author_id,
      pt.id
--      pt.content
    ORDER BY
      pt.created_at DESC
  ) AS p


  SELECT p.*
FROM (
    SELECT
        u1.id,
        uu.username,
        CASE
            WHEN uc.middle_name IS NOT NULL THEN uc.first_name || ' ' || uc.middle_name || ' ' || uc.last_name
            ELSE uc.first_name || ' ' || uc.last_name
        END AS full_name,
        u1.uid || up.ms || up.extension AS profile
    FROM users AS u1
    LEFT JOIN user_credentials AS uc ON u1.id = uc.user_id
    LEFT JOIN user_username AS uu ON u1.id = uu.user_id
    LEFT JOIN user_profile AS up ON u1.id = up.user_id
    JOIN follows AS f ON u1.id = f.follower_id
    WHERE f.following_id = 1  -- Replace :your_user_id with your actual user ID
) AS p

SELECT p.*
FROM (
    SELECT
        u1.id,
        uu.username,
        CASE
            WHEN uc.middle_name IS NOT NULL THEN uc.first_name || ' ' || uc.middle_name || ' ' || uc.last_name
            ELSE uc.first_name || ' ' || uc.last_name
        END AS full_name,
        u1.uid || up.ms || up.extension AS profile
    FROM users AS u1
    LEFT JOIN user_credentials AS uc ON u1.id = uc.user_id
    LEFT JOIN user_username AS uu ON u1.id = uu.user_id
    LEFT JOIN user_profile AS up ON u1.id = up.user_id
    JOIN follows AS f ON u1.id = f.following_id
    WHERE f.follower_id = 1
--    WHERE u1.id != 1  -- Replace :your_user_id with your actual user ID
) AS p

SELECT p.*
FROM (
    SELECT
        u1.id,
        uu.username,
        CASE
            WHEN uc.middle_name IS NOT NULL THEN uc.first_name || ' ' || uc.middle_name || ' ' || uc.last_name
            ELSE uc.first_name || ' ' || uc.last_name
        END AS full_name,
        u1.uid || up.ms || up.extension AS profile
    FROM users AS u1
    LEFT JOIN user_credentials AS uc ON u1.id = uc.user_id
    LEFT JOIN user_username AS uu ON u1.id = uu.user_id
    LEFT JOIN user_profile AS up ON u1.id = up.user_id
    WHERE u1.id = 1
--    WHERE u1.id != 1  -- Replace :your_user_id with your actual user ID
) AS p
