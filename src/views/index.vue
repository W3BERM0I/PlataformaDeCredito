<template>
   <main>
    <div class="caixa">
      <div class="caixa__propaganda">
        <h2 class="caixa__titulo">Você esta a procura de credito?</h2>
        <p class="caixa__texto">Somos a CredEasy e vamos lhe oferecer as melhores soluções e com as melhores taxas do mercado</p>
      </div>
      <div class="caixa__imagem">
        <img src="../assets/img/Credit-card-bro.svg" alt="referencia a creditos">
      </div>
    </div>
  </main>
  <section class="solucoes">
    <cardIndex :texto="'Voce esta pensando em ampliar o seu negocio mas esta sem capital venha conhecer as nossas soluções com juros baixos e sem burocracia'" :titulo="'Credito Empresarial'" />
    <cardIndex :texto="'Voce esta pensando em comprar ou trocar de automovel ou imovel'" :titulo="'Credito Pessoal'" />
    <cardIndex :texto="'Soluções exclusivas para estudantes financiarem suas mensalidades ou custo de vida.'" :titulo="'Credito Estudantil'" />
  </section>
  <section id="futuro">
    <div class="futuro__titulo">
      <h1 class="futuro__conteudo">Missão, Visão e Valores</h1>
    </div>
    <div class="cards-missao">
    <CardMissao :titulo="'Nossa missão'" :items="['valorizar o relacionamento, oferecer soluções financeiras para agregar renda e contribuir para a melhoria da qualidade da vida.']"/>
    <CardMissao :titulo="'Nossa visão'" :items="['Ser reconhecido pelos associados como uma instituição que ajudou a alavancar os seus sonhos, comprometida com o desenvolvimento econômico e social dos associados e das comunidades em um sistema sólido e eficaz.']"/>
    <cardMissao :titulo="'Nossos valores'" :items="['Preservação irrestrita da natureza do negócio.', 'Respeito à individualidade do associado.', 'Valorização e desenvolvimento das pessoas.', 'Preservação da instituição como sistema.', 'Respeito às normas oficiais e internas.', 'Eficácia e transparência na gestão']" />
    </div>
  </section>
  <section id="localizacao">
    <div class="loc">
      <h3>Venha nos visitar estamos localizados na cidade de Nova Petropolis</h3>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1738.4095217407412!2d-51.11370988190172!3d-29.375587208048234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x951eb3744efb0515%3A0xb7772dd429793ce8!2sSicredi%20Pioneira%20RS%20%7C%20Ag%C3%AAncia%20Empresarial!5e0!3m2!1spt-BR!2sbr!4v1647453176795!5m2!1spt-BR!2sbr" style="border:0;" allowfullscreen="" loading="lazy" class="map"></iframe>
    </div>
  </section>
</template>

<script>
import cardIndex from '../components/shared/card/card-index.vue'
import CardMissao from '../components/shared/card/card-missao.vue'
export default {

  components: {
    cardIndex,
    CardMissao,
}
}
</script>


<style scoped>
    
.cabecalhoPrincipal-titulo a {
  font-size: 3rem;
}

main {
  width: 100vw;
  height: 70vh;
  background-color: var(--preto);
  color: var(--brancoClaro);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  border-left: none;
}



.caixa {
  width: 100vw;
  display: flex;
  align-items: center;
  padding-left: 5vw;
}

.caixa__propaganda {
  justify-content: center;
  width: 60vw;
}

.caixa__titulo {
  font-weight: 700;
  font-size: 3rem;
  margin-bottom: 5vh;
  align-items: center;
}

.caixa__texto {
  font-size: 2rem;
}

.caixa__imagem {
  width: 30vw;
  justify-content: end;
  padding-right: 5vw;
}

.solucoes {
  background-color: var(--verdeClaro);
  display: flex;
  min-height: 60vh;
  flex-wrap: wrap;
  border-bottom: 2px solid;
  align-items: center;
  justify-content: space-evenly;
  padding-bottom: 2%;
}

#futuro {
  width: 100%;
  min-height: 80vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: var(--brancoEscuro);
}

.cards-missao {
  display: flex;
}

.futuro__titulo {
  width: 100vw;
  height: 20vh;
  display: flex;
  background-color: var(--brancoEscuro);
}

.futuro__conteudo {
  justify-content: center;
  align-items: auto;
  font-size: 3rem;
  margin: auto;

}

.missaoVisaoValores {
  display: flex;
  width: 100vw;
  min-height: 50vh;
  background-color: var(--brancoEscuro);
}

#localizacao {
  min-height: 40vh;
  display: flex;
}

.loc {
  width: 100vw;
  height: 80vh;
  display: flex;
}

.loc h3 {
  /*text-align: center;*/
  margin: auto 0 auto 2vw;
  font-size: 2.5rem;
  flex-wrap: wrap;
  width: 20vw;
  width: 80vw;
}

.map {
  width: 70vw;
}

@media screen and (max-width: 768px) {
  .solucoes {
    flex-direction: row;
  }

  .caixa__imagem {
    display: none;
  }

  .caixa__titulo {
    font-size: 2rem;

  }

  .caixa {
    height: 60vh;
  }

  .caixa__texto {
    font-size: 1.3rem;
  }

  
  .solucoes {
    display: flex;
    flex-direction: column;
    min-height: 60vh;
  }

  .solucoes>.solucoes__cred {
    height: 45vh;
    width: 95vw;
    justify-content: flex-end;
  }

  


  #futuro {
    min-height: 100vh;
    display: flex;
  }

  .cards-missao{
      display: flex;
      flex-direction: column;
      width: 100vw;
      min-height: 100vh;
  }

  .loc {
    min-height: 40vh;
    display: flex;
    flex-direction: column;
  }

  .loc>h3 {
    height: 20vh;
    margin-top: 0%;
    margin-bottom: 5vh;
    font-size: 1.5rem;
  }

  .map {
    width: 100vw;
    height: 30vh;
  }

  #localizacao {
    margin-top: 20vh;
    min-height: 30vh;
    max-height: 30vh;
  }
}
</style>