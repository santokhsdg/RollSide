<?php
require ("DBConnection");
//producing random results
// select * from users order by rand() limit 5


// first empty the table and then perform insertion
 ///////////////////////////////////////////////////

// FOR LATEST
//////////////////////////////////////////////////////////////////////////////
$sql="DELETE from latest";
$result1 = mysqli_query($con,$sql);
$sql="INSERT into latest  SELECT * from song where TYPE='ENGLISH' AND UPDATED=1 order by RELEASE_DATE desc LIMIT 100";
$result1 = mysqli_query($con,$sql);
$sql="INSERT into latest  SELECT * from song where TYPE='HINDI' AND UPDATED=1  order by RELEASE_DATE desc LIMIT 100";
$result1 = mysqli_query($con,$sql);
$sql="INSERT into latest  SELECT * from song where TYPE='PUNJABI' AND UPDATED=1  order by RELEASE_DATE desc LIMIT 100";
$result1 = mysqli_query($con,$sql);
////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////


// FOR POPULAR
// sum= downloads+likes+follows desc max;
$sql="DELETE from popular";
$result1 = mysqli_query($con,$sql);
$sql="INSERT into popular SELECT NAME,LOCATION,ARTIST1,GENRE,RELEASE_DATE,LIKES,FOLLOWERS,DOWNLOADS,ALBUM_NAME,IMG_LOCATION,SIZE,SONG_ID,TYPE,ARTIST2,ARTIST3,UPDATED FROM (SELECT *, (LIKES+DOWNLOADS+FOLLOWERS) AS total from song order by total desc) as t1 WHERE TYPE='ENGLISH' AND UPDATED=1 LIMIT 100 ";
$result1 = mysqli_query($con,$sql);
$sql="INSERT into popular SELECT NAME,LOCATION,ARTIST1,GENRE,RELEASE_DATE,LIKES,FOLLOWERS,DOWNLOADS,ALBUM_NAME,IMG_LOCATION,SIZE,SONG_ID,TYPE,ARTIST2,ARTIST3,UPDATED FROM (SELECT *, (LIKES+DOWNLOADS+FOLLOWERS) AS total from song order by total desc) as t1 WHERE TYPE='HINDI' AND UPDATED=1 LIMIT 100 ";
$result1 = mysqli_query($con,$sql);
$sql="INSERT into popular SELECT NAME,LOCATION,ARTIST1,GENRE,RELEASE_DATE,LIKES,FOLLOWERS,DOWNLOADS,ALBUM_NAME,IMG_LOCATION,SIZE,SONG_ID,TYPE,ARTIST2,ARTIST3,UPDATED FROM (SELECT *, (LIKES+DOWNLOADS+FOLLOWERS) AS total from song order by total desc) as t1 WHERE TYPE='PUNJABI' AND UPDATED=1 LIMIT 100 ";
$result1 = mysqli_query($con,$sql);

///////////////////////////////////////////////////////////
///////////////////////////////////////
// POPULAR SEARCHES
$sql="DELETE from popularsearches";
$result1 = mysqli_query($con,$sql);
$sql="INSERT into popularsearches  SELECT * from song where TYPE='ENGLISH' AND UPDATED=1  order by DOWNLOADS desc LIMIT 100";
$result1 = mysqli_query($con,$sql);
$sql="INSERT into popularsearches  SELECT * from song where TYPE='HINDI' AND UPDATED=1 order by DOWNLOADS desc LIMIT 100";
$result1 = mysqli_query($con,$sql);
$sql="INSERT into popularsearches  SELECT * from song where TYPE='PUNJABI' AND UPDATED=1  order by DOWNLOADS desc LIMIT 100";
$result1 = mysqli_query($con,$sql);
///////////////////////////////////////////////////////////
/////////////////////////////
// FOR TOP
// get max sum= downloads+likes+follows desc max; from latest table top 50
$sql="DELETE from top;";
$result1 = mysqli_query($con,$sql);
$sql="INSERT into top SELECT NAME,LOCATION,ARTIST1,GENRE,RELEASE_DATE,LIKES,FOLLOWERS,DOWNLOADS,ALBUM_NAME,IMG_LOCATION,SIZE,SONG_ID,TYPE,ARTIST2,ARTIST3,UPDATED FROM (SELECT *, (LIKES+DOWNLOADS+FOLLOWERS) AS total from latest order by total desc) as t1 WHERE TYPE='ENGLISH' AND UPDATED=1 LIMIT 50 ";
$result1 = mysqli_query($con,$sql);
$sql="INSERT into top SELECT NAME,LOCATION,ARTIST1,GENRE,RELEASE_DATE,LIKES,FOLLOWERS,DOWNLOADS,ALBUM_NAME,IMG_LOCATION,SIZE,SONG_ID,TYPE,ARTIST2,ARTIST3,UPDATED FROM (SELECT *, (LIKES+DOWNLOADS+FOLLOWERS) AS total from latest order by total desc) as t1 WHERE TYPE='HINDI' AND UPDATED=1 LIMIT 50 ";
$result1 = mysqli_query($con,$sql);
$sql="INSERT into top SELECT NAME,LOCATION,ARTIST1,GENRE,RELEASE_DATE,LIKES,FOLLOWERS,DOWNLOADS,ALBUM_NAME,IMG_LOCATION,SIZE,SONG_ID,TYPE,ARTIST2,ARTIST3,UPDATED FROM (SELECT *, (LIKES+DOWNLOADS+FOLLOWERS) AS total from latest order by total desc) as t1 WHERE TYPE='PUNJABI' AND UPDATED=1 LIMIT 50 ";
$result1 = mysqli_query($con,$sql);

?>