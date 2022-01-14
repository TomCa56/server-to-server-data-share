# server-to-server-data-share
php script to manage table share from remote server

//ISSUE - SERVERS USING DIFFERENT CHARSET
/*SELECT ‘COLUMN_NAME’ FROM ‘INFORMATION_SCHEMA’.’COLUMNS’ WHERE ‘TABLE_SCHEMA’='schema' AND ‘TABLE_NAME’='table';
SET @var = CONVERT(CAST(CONVERT("Ã§£#$..." USING latin1) AS BINARY) USING utf8);
SELECT @Var;*/
