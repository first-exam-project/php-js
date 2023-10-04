insert into regions (name)
values 
("Ayeyarwaddy"),
("Shan"),
("Kachin"),
("Kayah"),
("Kayin"),
("Chin"),
("Mon"),
("Rakhine"),
("Magway"),
("Sagaing"),
("Tanintharyi"),
("Bago");

create table townships (
    id int unsigned primary key auto_increment,
    name varchar (30) not null,
    region_id int unsigned not null
);

insert into townships (name, region_id)
values 
("Insein", 4),
("Shwepyithar", 4),
("Hlaingtharyar", 4),
("Mintat", 12);


select 
    townships.id,
    townships.name, 
    townships.region_id,
    regions.name as region_name
from 
    townships
left join 
    regions on regions.id = townships.region_id;


$pdo = new PDO();
$statement = $pdo->query("
    select 
        townships.id,
        townships.name, 
        townships.region_id,
        regions.name as region_name
    from 
        townships
    left join 
        regions on regions.id = townships.region_id;
")

$townships = $statement->fetchObj(PDO::FETCH_OBJ);


select * from regions where name like "Y";
