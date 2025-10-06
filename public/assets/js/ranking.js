        document.addEventListener('DOMContentLoaded', () => {
            // Tenta carregar os dados do usuário do localStorage
            const storedData = localStorage.getItem('userRankingData');
            
            let userInfo;
            if (storedData) {
                // Se houver dados salvos, usa-os
                userInfo = JSON.parse(storedData);
            } else {
                // Se não houver dados salvos (usuário não cadastrou/logou), usa dados padrão
                console.log("Nenhum dado de usuário encontrado. Usando dados padrão.");
                  userInfo = {
                      name: "Visitante",
                      class: "N/A",
                      level: "Novato",
                      points: 0,
                      nextLevelPoints: 210
                  };
            }

            const userGreeting = document.getElementById('user-greeting');
            const userInfoElement = document.getElementById('user-info');
            const userPointsElement = document.getElementById('user-points');
            const progressBar = document.getElementById('progress-bar');
            const nextLevelPointsElement = document.getElementById('next-level-points');
            const logoutButton = document.getElementById('logout-button');

            // Atualiza a interface com os dados do usuário
            userGreeting.textContent = `Olá, ${userInfo.name.split(' ')[0]}! 👋`; // Mostra apenas o primeiro nome
            userInfoElement.textContent = `Turma: ${userInfo.class} - Nível: ${userInfo.level}`;
            userPointsElement.textContent = `${userInfo.points} Pontos`;
            
            // Calcula e atualiza a barra de progresso
            let progressPercentage = 0;
            if (userInfo.nextLevelPoints > 0) {
                progressPercentage = Math.min(100, (userInfo.points / userInfo.nextLevelPoints) * 100);
            }
            
            progressBar.style.width = `${progressPercentage}%`;
            
            const pointsToNextLevel = Math.max(0, userInfo.nextLevelPoints - userInfo.points);
            nextLevelPointsElement.textContent = `${pointsToNextLevel} pontos para o próximo nível.`;
            
            // Lógica de Sair (Logout)
            logoutButton.addEventListener('click', function(event) {
                event.preventDefault();
                localStorage.removeItem('userRankingData'); // Remove os dados do usuário
                window.location.href = 'index.html'; // Redireciona de volta para a página de cadastro/login
            });
        });
