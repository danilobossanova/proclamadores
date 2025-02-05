<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DiscursosSeeder extends Seeder
{
    public function run(): void
    {
        $linhas = explode("\n", trim($this->getDiscursosTexto()));
        array_shift($linhas);

        foreach ($linhas as $linha) {
            $dados = explode("\t", $linha);
            if (count($dados) >= 4) {
                $tema = trim($dados[1]);
                $situacao = 'Disponivel';

                // Verifica se contém palavras-chave que indicam indisponibilidade
                if (stripos($tema, 'indisponível') !== false ||
                    stripos($tema, 'viajante') !== false ||
                    stripos($tema, '[indisponivel]') !== false) {
                    $situacao = 'Indisponivel';
                }

                DB::table('discursos')->insert([
                    'numero' => (int)$dados[0],
                    'tema' => $tema,
                    'novo' => false,
                    'versao' => !empty($dados[2]) ? trim($dados[2]) : null,
                    'ultimo_proferimento' => !empty($dados[3]) ? Carbon::createFromFormat('d/m/Y', trim($dados[3]))->format('Y-m-d') : null,
                    'situacao' => $situacao
                ]);
            }
        }
    }

    private function getDiscursosTexto(): string
    {
        return <<<EOT
Numero	Tema	Versão	Ultimo Proferimento
1	Você conhece bem a Deus?	09/15	12/08/2023
2	Você vai sobreviver aos últimos dias?	09/15
3	Você está avançando com a organização unida de Jeová?	09/15
4	Que provas temos de que Deus existe?	09/15
5	Você pode ter uma família feliz!	09/15	15/06/2024
6	O dilúvio dos dias de Noé e você	09/15	09/12/2023
7	Imitar a misericórdia de Jeová	12/15
8	Viver para fazer a vontade de Deus	09/15
9	Escute e faça o que a Bíblia diz (12/16)	12/16
10	Ser honesto em tudo	12/16
11	Imitar a Jesus e não fazer parte do mundo	12/16	06/04/2023
12	Deus quer que você respeite quem tem autoridade	12/16
13	Qual o ponto de vista de Deus sobre o sexo e o casamento?	12/16
14	Um povo puro e limpo honra a Jeová	10/18
15	'Faça o bem a todos'	12/16
16	Ser cada vez mais amigo de Jeová	12/16
17	Glorificar a Deus com tudo o que você tem	04/18	10/02/2024
18	Fazer de Jeová a sua fortaleza	04/18
19	Como você pode saber seu futuro?	01/20
20	Chegou o tempo de Deus governar o mundo?	07/18
21	Dar valor ao seu lugar no Reino de Deus	04/18
22	Você está usando bem o que Jeová lhe dá?	04/18	17/02/2024
23	A vida tem objetivo	06/18
24	Encontrar "uma pérola de grande valor"	08/20
25	Lutar contra o espírito do mundo
26	Você é importante para Deus ?		27/04/2024
27	Como construir um casamento feliz
28	Mostrar respeito e amor no seu casamento		09/09/2023
29	Responsabilidades e recompensas de ter filhos		25/05/2024
30	Melhorar a comunicação na família
31	Você tem consciência da sua necessidade espiritual? (8/18)
32	Como lidar com as ansiedades da vida		03/02/2024
33	Quando vai existir verdadeira justiça?
34	(Indisponível) Você vai ser marcado para sobreviver? (9/22)
35	É possível viver para sempre? O que você precisa fazer? (5/20)		02/12/2023
36	Será que a vida é só isso?
37	Obedecer a Deus é mesmo a melhor coisa a fazer? (03/17)
38	Como você pode sobreviver ao fim do mundo?
39	Confiar na vitória divina!
40	(Indisponível)
41	Ficar parado e ver como Jeová os salvará
42	(indisponivel) O efeito do Reino de Deus sobre você
43	Tudo o que Deus nos pede é para o nosso bem
44	Como os ensinos de Jesus podem ajudar você?
45	Continuar andando no caminho que leva à vida		23/12/2023
46	Fortaleça sua confiança em Jeová (09/20)
47	(Indisponível) 'Tenha fé nas boas novas' (09/95)
48	Ser leal a Deus mesmo quando for testado		09/03/2024
49	Um dia a Terra será limpa?
50	Sempre tomar as melhores decisões
51	A verdade da Bíblia está mudando a sua vida?
52	Quem é o seu Deus?
53	Pensar como Deus?
54	Fortalecer a fé em Deus e em suas promessas
55	Fazer um bom nome perante Deus?
56	Existe um líder em quem você pode confiar?
57	Suportar perseguição
58	Verdadeiros seguidores de Cristo?
59	Ceifar o que semear
60	Quão significativa é a sua vida?
61	Nas promessas de quem confiar?
62	Onde encontrar uma esperança real para o futuro?	2022
63	Ter espírito evangelizador?
64	Amar os prazeres ou a Deus?
65	Como ser pacífico num mundo cheio de ódio
66	Participar na colheita?
67	Meditar na Bíblia e nas criações de Jeová		13/01/2024
68	'Continuem a perdoar uns aos outros liberalmente' (09/22)
69	Por que mostrar amor abnegado?
70	Por que Deus merece sua confiança ? (10/23)	10/23
71	'Mantenha-se desperto' — Por que e como?		30/12/2023
72	O amor identifica os cristãos verdadeiros
73	Você tem "um coração sábio" ?		06/01/2024
74	Os olhos de Jeová nos observam
75	Reconhecer a soberania de Jeová em sua vida?
76	Princípios bíblicos — podem ajudar a lidar com os problemas atuais?		11/11/2023
77	"Sempre mostrem hospitalidade" (11/21)		08/06/2024
78	Servir a Jeová com coração alegre
79	Amizade com Deus ou com o mundo: qual escolher?
80	Basear a esperança na ciência ou na Bíblia?
81	Quem está habilitado para ser ministro de Deus?
82	Jeová e Cristo fazem parte de uma trindade?
83	Tempo de julgamento da religião
84	Escapar do destino deste mundo?
85	Boas notícias num mundo violento
86	Orações ouvidas por Deus
87	Qual é a sua relação com Deus?
88	Por que viver de acordo com os padrões da bíblia?		20/01/2024
89	Virem os que têm sede da verdade!
90	Fazer o máximo para alcançar a verdadeira vida!		05/08/2023
91	Presença do Messias e seu domínio
92	Papel da religião nos assuntos do mundo
93	Catástrofes naturais — como encarar?
94	Religião verdadeira atende às necessidades da sociedade humana
95	Conceito da Bíblia sobre práticas espíritas
96	O que vai acontecer com as religiões?
97	Permanecer inculpe em meio a uma geração pervertida
98	"Cena deste mundo está mudando"
99	Por que você pode confiar na Bíblia (09/97)
100	Como fazer amizades fortes e verdadeiras		21/10/2023
101	Jeová — o Grandioso Criador		06/07/2024
102	Prestar atenção à Palavra Profética
103	Como você pode ter a verdadeira alegria?	10/24
104	Pais — estão construindo com materiais à prova de fogo?
105	Consolados em todas as tribulações
106	Arruinar a Terra provocará retribuição divina		16/12/2023
107	Ter uma boa consciência neste mundo pecaminoso	10/23
108	Você pode encarar o futuro com confiança! (10/23)
109	Reino de Deus está próximo
110	Deus vem primeiro na vida familiar bem-sucedida (01/95)
111	O que é realizado pela cura das nações?
112	[Indisponivel] Como expressar amor num mundo que viola a lei		30/09/2023
113	Jovens — Como vocês podem ter uma vida feliz?		04/05/2024
114	Apreciar as maravilhas da criação de Deus
115	Proteger-se contra os laços de Satanás
116	Escolher sabiamente com quem associar-se!		26/08/2023
117	Vencer o mal com o bem
118	Olhar os jovens do ponto de vista de Jeová
119	Por que é benéfico que os cristãos vivam separados do mundo
120	Por que se submeter à regência de Deus agora
121	Fraternidade mundial salva da calamidade
122	Paz global — de onde virá?		01/06/2024
123	[Bloqueado] Por que os cristãos têm de ser diferentes? 01/05/24
124	Razões para crer que a Bíblia é de autoria divina
125	Por que a humanidade precisa de resgate?
126	Quem se salvará?
127	O que acontece quando morremos?
128	Inferno um lugar de tormento ardente?
129	Trindade um ensino bíblico?
130	Terra permanecerá para sempre
131	[Indisponivel] Será que o Diabo realmente existe?		30/03/2024
132	Ressurreição — a vitória sobre a morte! (10/24)	10/24	16/03/2024
133	Importância do que cremos sobre nossa origem?
134	Cristãos devem guardar o sábado?
135	Santidade da vida e do sangue
136	Deus aprova o uso de imagens na adoração?
137	Realmente ocorreram os milagres da Bíblia?
138	Viver com bom juízo num mundo depravado
139	Sabedoria divina num mundo científico
140	Quem é realmente Jesus Cristo?
141	Quando terão fim os gemidos da criação humana?
142	Por que refugiar-se em Jeová
143	Confiar no Deus de todo consolo
144	Congregação leal sob a liderança de Cristo
145	Quem é semelhante a Jeová, nosso Deus?
146	Usar a educação para louvar a Jeová
147	Confiar no poder salvador de Jeová
148	Tem o mesmo conceito de Deus sobre a vida?
149	O que significa "andar com Deus"?
150	Este mundo está condenado à destruição?		19/08/2023
151	Jeová é "uma altura protetora" para seu povo
152	Armagedom — por que e quando?
153	Ter bem em mente o "atemorizante dia"!
154	Governo humano é pesado na balança
155	Chegou a hora do julgamento de Babilônia?
156	Dia do Juízo — tempo de temor ou de esperança?
157	Como os verdadeiros cristãos adornam o ensino divino
158	Ser corajoso e confiar em Jeová		02/09/2023
159	Como encontrar segurança num mundo perigoso
160	Manter a identidade cristã!		28/10/2023
161	Por que Jesus sofreu e morreu?
162	Ser liberto deste mundo em escuridão
163	Por que temer o Deus verdadeiro?
164	Deus ainda está no controle?		09/03/2024
165	Valores de quem preza?
166	Como enfrentar o futuro com fé e coragem		18/05/2024
167	Agir sabiamente num mundo insensato
168	Você pode sentir-se seguro neste mundo atribulado! (11/06)
169	Por que ser orientado pela Bíblia?
170	Quem está qualificado para governar a humanidade? (12/07)		07/10/2023
171	Poderá viver em paz agora — e para sempre!
172	Que reputação tem perante Deus?
173	Existe uma religião verdadeira do ponto de vista de Deus?
174	Quem se qualificará para entrar no novo mundo de Deus?
175	O que prova que a Bíblia é autêntica?
176	Quando haverá verdadeira paz e segurança?
177	Onde encontrar ajuda em tempos de aflição?
178	Andar no caminho da integridade		13/07/2024
179	Rejeitar as fantasias do mundo, empenhar-se pelas realidades do Reino
180	Ressurreição — por que essa esperança deve ser real para você
181	Já é mais tarde do que você imagina?
182	O que o Reino de Deus está fazendo por nós agora?
183	Desviar os olhos do que é fútil
184	A morte é o fim de tudo?		18/11/2023
185	A verdade influencia sua vida?
186	Servir em união com o povo feliz de Deus
187	Por que um Deus amoroso permite a maldade?
188	Confiar em Jeová?
189	Andar com Deus e receber bênçãos para sempre
190	Como cumprirá a promessa de perfeita felicidade familiar
191	Como amor e fé vencem o mundo
192	Está no caminho para a vida eterna?		16/09/2023
193	Problemas de hoje logo serão coisa do passado
194	Como a sabedoria de Deus nos ajuda		04/11/2023
EOT;
    }
}
