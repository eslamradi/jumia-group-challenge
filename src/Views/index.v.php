<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Jumia Exercise</title>
</head>

<body>
    <div class="container-fluid px-4 py-2">
        <div class="row">
            <h1>Phone numbers</h1>
        </div>
        <form class="row g-3">
            <div class="col-auto">
                <select class="form-select" name="country" id="country">
                    <option value="">All countries</option>
                    <?php foreach($countries as $country => $data) : ?>
                        <option value="<?= $country ?>" <?= (!empty($_GET['country']) and $country == $_GET['country']) ? 'selected' : '' ?>>
                            <?= $country ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-auto">
                <select class="form-select" name="state" id="state">
                    <option value="">All numbers</option>
                    <option value="OK" <?= (!empty($_GET['state']) and $_GET['state'] == 'OK') ? 'selected' : '' ?>>Valid numbers</option>
                    <option value="NOK" <?= (!empty($_GET['state']) and $_GET['state'] == 'NOK') ? 'selected' : '' ?>>Not valid numbers</option>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Filter</button>
            </div>
        </form>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>State</th>
                        <th>Country Code</th>
                        <th>Phone num.</th>
                    </tr>
                </thead>
                <?php foreach ($records as $phone) : ?>
                    <tr>
                        <td><?= $phone['country'] ?></td>
                        <td><?= $phone['state'] ?></td>
                        <td><?= $phone['code'] ?></td>
                        <td><?= $phone['number'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="row">
            <div class="col m-auto">
                <p class="float-left" style="align-items: center;">showing <?= count($records) ?> of <?= $total ?> results</p>
            </div>
            <div class="col m-auto">
                <nav aria-label="Page navigation example">
                    <ul class="float-end pagination justify-content-center">
                        <?php foreach ($links as $key => $link) : ?>
                            <?php if ($link == '#') : $disabled = true;
                            else : $disabled = false;
                            endif; ?>
                            <li class="page-item <?= $disabled ? 'disabled' : '' ?>">
                                <a class="page-link" aria-disabled="<?= $disabled ?>" href="<?= $link ?>"><?= $key + 1 ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</body>

</html>