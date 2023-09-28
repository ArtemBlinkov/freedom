const defaultUrl = 'http://freedom-service.local/api/get-products?size=10',
    tableId = '#productTable';

let spa = {
    /** Массив продуктов */
    products: [],
    /** Количество страниц */
    countPages: 0,
    /**
     * Инициализация приложения
     */
    init: function () {
        this.getData(defaultUrl);
    },
    /**
     * Получить данные по url
     * @param url
     */
    getData: function (url) {
        let spa = this;

        $.ajax({
            url: url,
            method: 'GET'
        }).done(function (result) {
            if (!!result.products && result.products.length > 0) {
                spa.products = result.products;
                spa.countPages = result.countPages;
                spa.updateTable();
                spa.updatePager($('#prevPage'), result.prevPage);
                spa.updatePager($('#nextPage'), result.nextPage);
            } else {
                alert('Error: data is empty!');
            }
        }).fail(function () {
            alert('Error: mistake in request!');
        });
    },
    /**
     * Обновить таблицу новыми данными
     */
    updateTable: function () {
        $(tableId).find('tbody').html(this.createRows());
    },
    /**
     * Обновить ссылки в пагинаторе
     * @param $element
     * @param url
     */
    updatePager: function ($element, url) {
        if (url === '#') {
            $element.addClass('disabled');
        } else {
            $element.removeClass('disabled');
        }
        $element.attr('href', url);
    },
    /**
     * Создать вёрстку таблицы
     * @returns {string}
     */
    createRows: function () {
        let html = '';
        this.products.forEach(function (item) {
            html += '<tr>';
            html += `<td>${item.product_id}</td>`;
            html += `<td>${item.title}</td>`;
            html += `<td>${item.price}</td>`;
            html += `<td>${item.quantity}</td>`;
            html += '<tr>';
        });
        return html;
    },
    /**
     * Обновить размер страницы в ссылке
     * @param size
     * @returns {string}
     */
    updateLink: function (size) {
        return defaultUrl.replace('size=10', 'size=' + size);
    }
};

document.addEventListener("DOMContentLoaded", function () {
    spa.init();

    $('.page-link').on('click', function (event) {
        event.preventDefault();
        spa.getData(this.href);
        return false;
    });

    $('.dropdown-item').on('click', function () {
        let $element = $(this);
        $element.parent().find('.dropdown-item').each(function (key, element) {
            $(element).removeClass('active');
        });
        $element.addClass('active');

        let link = spa.updateLink($element.data('size'));
        spa.getData(link);
    });
});