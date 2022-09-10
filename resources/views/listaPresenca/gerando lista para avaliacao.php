<!DOCTYPE HTML>
<html>
  <head>
	<title>Gerador de Listas de Presença para Avaliações</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<style type="text/css">
	body { font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif; color:#666; background-color: #EDEDED; }
	table { text-align: center; }
	input[type="text"] { text-align: center; }
	</style>
  </head>

  <body>
	<div align="center">
	<h3>Gerador de Listas de Presença para Avaliações</h3>
	<form name="form" method="get" target="_blank">
	  <label for="disciplina">Disciplina</label><br />
	  <input name="disciplina" type="text" size="48" title="Exemplo: PRÁTICAS DE LEITURA E ESCRITA II (ECT 1205)">
	  <br />
	  <br />
	  <label for="professor">Professor</label><br />
	  <input name="professor" type="text" size="48" title="Exemplo: Prof. Dr. JOÃO SILVA">
	  <br />
	  <br />
		<table border="0" cellspacing="10">
		  <tr>
			<td>
			  <label for="avaliacao">Avaliação</label><br />
			  <select name="avaliacao" size="1">
				<option value="Primeira Avaliação" selected>Primeira Avaliação</option>
				<option value="Segunda Avaliação">Segunda Avaliação</option>
				<option value="Terceira Avaliação">Terceira Avaliação</option>
				<option value="Exame Final">Exame Final</option>
			  </select>
			</td>
			<td>
			  <label for="data">Data</label><br />
			  <input name="data" type="text" size="15" title="Exemplo: 18 de junho de 2011">
			</td>
			<td>
			  <label for="semestre">Semestre</label><br />
			  <input name="semestre" type="text" size="10" title="Exemplo: 2011.1">
			</td>
		  </tr>
		</table>
	  <br />
	  <label for="local">Locais e Vagas</label><br />
	  <textarea name="local" rows="3" cols="60" title="Um local por linha. Exemplo: Anfiteatro 1 = 120"></textarea>
	  <br />
	  <br />
	  <label for="graduandos">Lista de Graduandos</label><br />
	  <textarea name="graduandos" rows="10" cols="60" title="Um nome por linha, em qualquer ordem"></textarea>
	  <br />
	  <br />
	  <input type="button" value="Gerar Listas" onclick="mostrarListas()" /><input type="button" value="Mostrar Exemplo" onclick="exemplificar()" /><input type="button" value="Recomeçar" onclick="document.form.reset(); datar();"/>
	</form>
	</div>

	<script type="text/javascript">
	window.onload = datar();

	function datar()
	{
		var mes = ['janeiro','fevereiro','março','abril','maio','junho','julho','agosto','setembro','outubro','novembro','dezembro'];
		var date = new Date();

		document.form.data.value = date.getDate() + " de " + mes[date.getMonth()] + " de " + date.getFullYear();
		document.form.semestre.value = date.getFullYear() + "." + (date.getMonth() < 7 ? "1" : "2");
	}

	function exemplificar()
	{
		document.form.disciplina.value = "NOME DA DISCIPLINA (ECT 1205)";
		document.form.professor.value = "Profª Drª Maria Santa e Prof. Dr. João Silva";
		document.form.local.value = "Anfiteatro 3 = 11\nSala 5 = 15\nAnfiteatro 1 = 13\nSala 1 = 14\nSala 7 = 18";
		document.form.graduandos.value = "Estudante Número 01\nEstudante Número 02\nEstudante Número 03\nEstudante Número 04\nEstudante Número 05\nEstudante Número 06\nEstudante Número 07\nEstudante Número 08\nEstudante Número 09\nEstudante Número 10\nEstudante Número 11\nEstudante Número 12\nEstudante Número 13\nEstudante Número 14\nEstudante Número 15\nEstudante Número 16\nEstudante Número 17\nEstudante Número 18\nEstudante Número 19\nEstudante Número 20\nEstudante Número 21\nEstudante Número 22\nEstudante Número 23\nEstudante Número 24\nEstudante Número 25\nEstudante Número 26\nEstudante Número 27\nEstudante Número 28\nEstudante Número 29\nEstudante Número 30\nEstudante Número 31\nEstudante Número 32\nEstudante Número 33\nEstudante Número 34\nEstudante Número 35\nEstudante Número 36\nEstudante Número 37\nEstudante Número 38\nEstudante Número 39\nEstudante Número 40\nEstudante Número 41\nEstudante Número 42\nEstudante Número 43\nEstudante Número 44\nEstudante Número 45\nEstudante Número 46\nEstudante Número 47\nEstudante Número 48\nEstudante Número 49\nEstudante Número 50\nEstudante Número 51\nEstudante Número 52\nEstudante Número 53\nEstudante Número 54\nEstudante Número 55\nEstudante Número 56\nEstudante Número 57\nEstudante Número 58\nEstudante Número 59\nEstudante Número 60\nEstudante Número 61\nEstudante Número 62\nEstudante Número 63\nEstudante Número 64\nEstudante Número 65\nEstudante Número 66\nEstudante Número 67\nEstudante Número 68\nEstudante Número 69\nEstudante Número 70";
		mostrarListas();
	}

	function gerarListas()
	{
		var graduandos = document.form.graduandos.value.split(/[\n\r]+/);
		var listas = document.form.local.value.split(/[\n\r]+/);
		var graduandoAtual = 0; // armazena o número (que inicia de 0) do graduando atual
		var CSS = "<style>table { border-collapse:collapse; width:100%; } td { width:50% }</style>";
		var HTML = ""; // armazena todo o código HTML que será exibido como resultado

		graduandos.sort(); // organiza os nomes em ordem alfabética

		HTML = CSS + "<div align='center'>";

		for (var i = 0; i < listas.length; i++) // para cada lista...
		{
			var lv = listas[i].split(" = "); // separa o local do número de vagas

			if (lv[1] == null) // mesmo que o usuário digite fora do padrão, o resultado ainda pode ser obtido
				lv = listas[i].split("=");
			else if (lv[1] == null)
				lv = listas[i].split(" =");
			else if (lv[1] == null)
				lv = listas[i].split("= ");

			var local = lv[0];
			var vagas = lv[1];
			var nomes = "";
			var cabecalho = "UNIVERSIDADE FEDERAL DO BRASIL - ESCOLA DE CIÊNCIAS E TECNOLOGIA" + "<br />" +
			document.form.disciplina.value + " - " + document.form.semestre.value + "<br />" +
			document.form.professor.value + "<br />" +
			document.form.avaliacao.value + " - " + document.form.data.value + " - " + local;

			for (var j = 0; j < vagas; j++) // para cada graduando que estiver dentro do número de vagas...
			{
				if (graduandoAtual < graduandos.length) // se ainda não foram alocados todos os graduandos...
				{
					nomes += "<tr><td>" + graduandos[graduandoAtual] + "</td><td></td></tr>";

					graduandoAtual++;
				}
			}

			HTML += cabecalho + "<br /><br /><table border='1'>" + nomes + "</table><br /><br />";
		}

		HTML += "</div>";
		return HTML;
	}

	function mostrarListas()
	{
		var listas = gerarListas();
		var resultado = window.open("","listas","height=600,width=800,scrollbars=yes");
		resultado.document.open();
		resultado.document.write(listas);
		resultado.document.close();
		if (window.focus) {resultado.focus()};
	}
	</script>
  </body>
</html>