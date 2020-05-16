# TDLoads

 A mini php file download with optionated authorization.

## Usage

It's as simple as visting the link below, ensure the folder structure are arranged on the path variable (path) in the right order while file name (filename) and extention (ext) are correctly entered.

NOTE: Ensure the mode option is left as transfer.

For any other configuration see the .env file, also note the you should include your files on storage folder  by default.

`````
http://localhost/?mode=transfer&path=test1&path=test2&filename=customers&ext=xlsx
`````


### Some config options


`````

STORAGE_PATH=storage
CACHE_PATH=cache
AUTH_TYPE=passkey
AUTH_TIMEOUT=3600
SESSION_KEY=dl_session
PASS_KEY=pass@123
DATABASE_TYPE=postgres
DATABASE_HOST=127.0.0.1
DATABASE_PORT=5432
DATABASE_USER=root
DATABASE_PASS=P@55w0rd

`````