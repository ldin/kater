<!-- Modal -->
<div class="modal fade" id="reviewForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Связаться с нами</h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <p>Вы можете позвонить нам по телефону</p>
                    <p>
                        <a href="tel:{{!empty($settings['phone'])?preg_replace('/[^0-9]/', '', $settings['phone']):''}}">
                            <i class="glyphicon glyphicon-earphone call-ico"></i><span itemprop="telephone"> {{ !empty($settings['phone'])?$settings['phone']:'' }}</span>
                        </a>
                    </p>
                </div>
                <div class="text-center">
                    <p>Или оставить заявку и мы Вам перезвоним</p>
                    <form method="POST" action="/form-request"  role="form" class="contact-form-2">
                        <div class="form-group">
                            <label for="inputName" class="sr-only">Имя</label>
                            <input type="text" name="name" class="form-control" id="inputName" placeholder="Ваше имя" required>
                        </div>
                        <div class="form-group">
                            <label for="inputPhohe" class="sr-only">Телефон</label>
                            <input type="phone" name="phone" class="form-control" id="inputPhohe" placeholder="Ваш телефон" >
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="sr-only">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Ваш e-mail">
                        </div>

                        <div class="form-group">
                            <label for="inputQuestion" class="sr-only">Текст сообщения</label>
                            <textarea name="text" class="form-control" id="inputQuestion" placeholder="Текст сообщения" rows='4' required></textarea>
                        </div>
                        <button type="submit" class="btn btn-main">Оставить сообщение</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
