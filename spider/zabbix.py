# -*- coding: utf-8 -*-

from playwright.sync_api import sync_playwright
from PIL import Image

def run():
    with sync_playwright() as p:
        browser = p.chromium.launch()
        context = browser.new_context()
        page = context.new_page()

        # Abre o site do Zabbix
        page.goto("http://zabbix.estracta.com/zabbix/index.php")

        # Preenche o campo de nome de usuário (Admin)
        page.fill('//*[@id="name"]', 'Admin')

        # Preenche o campo de senha
        page.fill('//*[@id="password"]', 'Jd$vt3KxWLtW@7Tv')

        # Clica no botão de login
        page.click('//*[@id="enter"]')

        # Espera um pouco para permitir o redirecionamento ou carregamento da próxima página
        page.wait_for_timeout(5000)

        # Captura o HTML da página de destino após o login (opcional)
        logged_in_html = page.content()

        # Tirar uma captura de tela após o login e salvar como imagem
        screenshot_path_after_login = '/home/ggabriel/login10/laravel-fortify-example/public/images/zabbix.png'
        page.screenshot(path=screenshot_path_after_login)

        # Fechar o navegador
        browser.close()

if __name__ == "__main__":
    run()
