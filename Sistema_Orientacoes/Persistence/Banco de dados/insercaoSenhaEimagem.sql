alter table aluno
add (
	senhaAluno varchar(45) not null,
	imagemAluno varchar(100) default null,
    entrou datetime default null,
    saiu datetime default null
);

alter table professor
add (
	senhaProfessor varchar(45) not null,
	imagemProfessor varchar(100) default null,
    entrou datetime default null,
    saiu datetime default null
);