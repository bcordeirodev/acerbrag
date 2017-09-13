<?php



/**
 * Skeleton subclass for representing a row from the 'pesquisa' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Default
 */
class Pesquisa extends BasePesquisa {

	/**
	 * Salva as perguntas padrões adicionadas em todas as pesquisas.
	 */
	public function setDefaultQuestions()
	{
		$question1 = new Pergunta;
		$question1->setTexto('Idade');
		$question1->setPesquisa($this);
		$question1->setCategoriaId(Categoria::CATEGORIA_PADRAO);
		$question1->setTipoResposta(Resposta::RESPOTA_TIPO_NUMERO);
		$question1->setPosicao(1);
		$question1->save();

		$question2 = new Pergunta;
		$question2->setTexto('Sexo');
		$question2->setPesquisa($this);
		$question2->setCategoriaId(Categoria::CATEGORIA_PADRAO);
		$question2->setTipoResposta(Resposta::RESPOTA_TIPO_OPCAO_UNICA);
		$question2->setPosicao(2);
		$question2->save();

		// Opções da pergunta 3.
		$option1 = new Alternativa;
		$option1->setPergunta($question2);
		$option1->setTexto('Masculino');
		$option1->setPosicao(0);
		$option1->save();

		$option2 = new Alternativa;
		$option2->setPergunta($question2);
		$option2->setTexto('Feminino');
		$option2->setPosicao(1);
		$option2->save();
	}
} // Pesquisa
