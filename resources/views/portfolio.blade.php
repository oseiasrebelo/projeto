<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfólio Oseias</title>

    @vite(['resources/css/index.css'])
</head>
<body>
    <header>
        <!-- ==========================  
            MENU DE NAVEGAÇÃO
        ========================== -->
        <nav class="navbar">
            <h2 class="logo">Meu Portfólio</h2>

            <button class="menu-toggle" aria-label="Abrir Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <ul class="menu">
                <li><a href="#inicio">Início</a></li>
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="#habilidades">Habilidades</a></li>
                <li><a href="#projetos-curso">Projetos</a></li>
                <li><a href="#projetos-php">Atividades</a></li>
                <li><a href="#contato">Contato</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <!-- ==========================  
            INÍCIO / HERO
        ========================== -->
        <section id="inicio" class="inicio">
            <div class="inicio-conteudo"> 
                <p class="saudacao">Olá! Eu sou o</p>

                <h1>Oseias</h1>

                <h2>Desenvolvedor em formação</h2>

                <p>
                    Estudante de Desenvolvimento de Sistemas
                </p>

                <a href="#projetos-curso" class="botao">
                    Ver meus projetos
                </a>    
            </div>
        </section>

        <!-- ==========================  
            SOBRE MIM
        ========================== -->
        <section id="sobre" class="secao">
            <div class="sobre_conteudo">
                <div class="foto">
                    <img src="/resources/images/louca.png" alt="Foto de perfil de Oseias">  
                </div>
                <div class="sobre-texto">
                    <h3>Quem sou eu?</h3>
                    <p>
                        Meu nome é Oseias e sou estudante de Desenvolvimento de Sistemas.
                    </p>
                    <p>
                        Atualmente estou cursando desenvolvimento em front-end e back-end.
                        Este portfólio reúne alguns dos projetos desenvolvidos durante o curso de Desenvolvimento de Sistemas (SENAI).
                    </p>
                    <p>
                        Meu objetivo é continuar evoluindo como Desenvolvedor, aprendendo novas tecnologias e me adaptando ao cenário mais recente do mercado.
                    </p>
                </div>
            </div>
        </section>

        <!-- ==========================  
            HABILIDADES
        ========================== -->
        <section id="habilidades" class="secao secao-destaque">
            <h2 class="titulo-secao">Minhas Habilidades</h2>
            <p class="subtitulo-secao">
                Algumas tecnologias que estou estudando:
            </p>
            <div class="lista-habilidades">
                <div class="habilidade">HTML</div>
                <div class="habilidade">CSS</div>
                <div class="habilidade">JS</div>
                <div class="habilidade">REACT</div>
                <div class="habilidade">PYTHON</div>
                <div class="habilidade">LINGUAGEM C</div>
                <div class="habilidade">PHP</div>
            </div>
        </section>

        <!-- ==========================  
            PROJETOS - CURSO
        ========================== -->
        <section id="projetos-curso" class="secao">
            <h2 class="titulo-secao">Meus Projetos</h2>
            <p class="subtitulo-secao">
                Alguns projetos desenvolvidos durante o curso.
            </p>
            
            <div class="projetos-container">
                <!-- PROJETO 1 -->
                <div class="projeto-card">
                    <div class="projeto-numero">01</div>
                    <h3>Estufa IOT (C e Python)</h3>
                    <p>
                        Sistema de estufa com controle de condições climáticas através de sensores.
                    </p>
                    <div class="tecnologias">
                        <span>Python</span>
                        <span>Linguagem C</span>
                    </div>
                    <a href="https://github.com/TiciMilfont/Estufa---IOT---MQTT" class="link-projeto" target="_blank">Ver projeto →</a>
                </div>
                
                <!-- PROJETO 2 -->
                <div class="projeto-card">
                    <div class="projeto-numero">02</div>
                    <h3>Sensor de velocidade</h3>
                    <p>
                        Ecossistema de Internet das Coisas (IoT) voltado para telemetria automotiva e monitoramento de velocidade
                        em tempo real. Integra firmware em C/C++ (ESP32-S3), API em Node.js (Express) com MySQL e dashboard web responsivo.
                    </p>
                    <div class="tecnologias">
                        <span>ESP32</span>
                        <span>Front-End</span>
                        <span>Node.js / Express</span>
                    </div>
                    <a href="https://github.com/TiciMilfont/Moto-do-Xand-o" class="link-projeto" target="_blank">Ver projeto →</a>
                </div>
            </div>
        </section>

        <!-- ==========================  
            PROJETOS - PHP (ATIVIDADES)
        ========================== -->
        <section id="projetos-php" class="secao secao-destaque">
            <h2 class="titulo-secao">Minhas Atividades</h2>
            <p class="subtitulo-secao">
                Algumas atividades desenvolvidas durante as aulas de PHP.
            </p>
            
            <div class="projetos-container">
                <!-- PROJETO 1 -->
                <div class="projeto-card">
                    <div class="projeto-numero">01</div>
                    <h3>Verificar idade em PHP</h3>
                    <p>
                        Aplicação web responsiva desenvolvida em PHP estruturado e HTML5 para validação dinâmica de dados e controle de fluxo via método POST.
                    </p>
                    <div class="tecnologias">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>PHP</span>
                    </div>
                    <a href="/index.php?rota=idade" class="link-projeto">Ver atividade →</a>
                </div>

                <!-- PROJETO 2 -->
                <div class="projeto-card">
                    <div class="projeto-numero">02</div>
                    <h3>Verificar notas em PHP</h3>
                    <p>
                        Sistema de gestão acadêmica em PHP nativo e HTML5 que processa e valida o desempenho de estudantes via formulário POST.
                    </p>
                    <div class="tecnologias">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>PHP</span>
                    </div>
                    <a href="/index.php?rota=notas" class="link-projeto">Ver atividade →</a>
                </div>

                <!-- PROJETO 3 -->
                <div class="projeto-card">
                    <div class="projeto-numero">03</div>
                    <h3>Login básico em PHP</h3>
                    <p>
                        Mecanismo básico de autenticação desenvolvido em PHP nativo e HTML5 para simular o fluxo de login de um usuário.
                    </p>
                    <div class="tecnologias">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>PHP</span>
                        <span>JavaScript</span>
                    </div>
                    <a href="/index.php?rota=login_basico" class="link-projeto">Ver atividade →</a>
                </div>

                <!-- PROJETO 4 -->
                <div class="projeto-card">
                    <div class="projeto-numero">04</div>
                    <h3>Cadastro de jogos em PHP</h3>
                    <p>
                        Aplicação CRUD em PHP nativo utilizando PDO para integração, persistência e leitura de dados em MySQL.
                    </p>
                    <div class="tecnologias">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>PHP</span>
                    </div>
                    <a href="/index.php?rota=jogos" class="link-projeto">Ver atividade →</a>
                </div>

                <!-- PROJETO 5 -->
                <div class="projeto-card">
                    <div class="projeto-numero">05</div>
                    <h3>Desafio para Atividades Notas</h3>
                    <p>
                        Sistema de gestão acadêmica em PHP nativo e HTML5 para cálculo de médias ponderadas complexas e verificação de status escolar.
                    </p>
                    <div class="tecnologias">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>PHP</span>
                    </div>
                    <a href="/index.php?rota=desafio_notas" class="link-projeto">Ver atividade →</a>
                </div>

                <!-- PROJETO 6 -->
                <div class="projeto-card">
                    <div class="projeto-numero">06</div>
                    <h3>Chamado de TI</h3>
                    <p>
                        Sistema básico de gerenciamento de chamados técnicos para registrar e acompanhar problemas de tecnologia da informação.
                    </p>
                    <div class="tecnologias">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>PHP</span>
                        <span>JSON</span>
                    </div>
                    <a href="/index.php?rota=git projeto.chamados.ti/helpdesk.php" class="link-projeto">Ver atividade →</a>
                </div>
            </div>
        </section>

        <!-- ==========================  
            CONTATO
        ========================== -->
        <section id="contato" class="secao">
            <h2 class="titulo-secao">Contato</h2>
            <p class="subtitulo-secao">
                Entre em contato comigo:
            </p>
            <div class="contato-container">
                <div class="contato-item">
                    <h3>WhatsApp</h3>
                    <p>+55 (41) xxxxx-xxxx</p>
                </div>
                <div class="contato-item">
                    <h3>GitHub</h3>
                    <a href="https://github.com/oseiasrebelo" target="_blank">github.com/oseiasrebelo</a>
                </div>
                <div class="contato-item">
                    <h3>LinkedIn</h3>
                    <a href="https://linkedin.com/in/ticianamilfont" target="_blank">linkedin.com/in/ticianamilfont</a>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>
            Desenvolvido por <a href="https://ticiana315.devlook.xyz" target="_blank">Oseias</a> &copy; 2026
        </p>
    </footer>

    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const menu = document.querySelector('.menu');

        menuToggle.addEventListener('click', () => {
            menuToggle.classList.toggle('ativo');
            menu.classList.toggle('ativo');
        });

        document.querySelectorAll('.menu a').forEach(link => {
            link.addEventListener('click', () => {
                menuToggle.classList.remove('ativo');
                menu.classList.remove('ativo');
            });
        });
    </script>
</body>
</html>