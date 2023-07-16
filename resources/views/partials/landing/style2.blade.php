<style>
    html,
    body {
        min-height: 100%;
    }

    body,
    div,
    form,
    input,
    select,
    textarea,
    label,
    p {
        padding: 0;
        margin: 0;
        outline: none;
        font-family: Montserrat, sans-serif;
        font-size: 14px;
        color: #666;
        line-height: 22px;
    }

    h1 {
        position: absolute;
        margin: 0;
        font-size: 40px;
        color: #fff;
        z-index: 2;
        line-height: 83px;
    }

    textarea {
        width: calc(100% - 12px);
        padding: 5px;
    }

    .testbox {
        display: flex;
        justify-content: center;
        align-items: center;
        height: inherit;
        padding: 20px;
    }

    form {
        width: 100%;
        padding: 20px;
        border-radius: 6px;
        background: #fff;
        box-shadow: 0 0 8px #F48315;
    }

    .banner {
        position: relative;
        height: 350px;
        background-image: url("{{ asset('images/1jKsECHMBc2y.jpg') }}");
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .banner::after {
        content: "";
        background-color: rgba(0, 0, 0, 0.2);
        position: absolute;
        width: 100%;
        height: 100%;
    }

    input,
    select,
    textarea {
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    input {
        width: calc(100% - 10px);
        padding: 5px;
    }

    input[type="date"] {
        padding: 4px 5px;
    }

    textarea {
        width: calc(100% - 12px);
        padding: 5px;
    }

    .item:hover p,
    .item:hover i,
    .question:hover p,
    .question label:hover,
    input:hover::placeholder {
        color: #F48315;
    }

    .item input:hover,
    .item select:hover,
    .item textarea:hover {
        border: 1px solid transparent;
        box-shadow: 0 0 3px 0 #F48315;
        color: #F48315;
    }

    .item {
        position: relative;
        margin: 10px 0;
    }

    .item span {
        color: red;
    }

    .week {
        display: flex;
        justify-content: space-between;
    }

    .colums {
        display: flex;
        justify-content: space-between;
        flex-direction: row;
        flex-wrap: wrap;
    }

    .colums div {
        width: 48%;
    }

    .colums2 {
        display: flex;
        justify-content: space-between;
        flex-direction: row;
        flex-wrap: wrap;
    }

    .colums2 div {
        width: 22%;
    }

    .colums3 {
        display: flex;
        justify-content: space-between;
        flex-direction: row;
        flex-wrap: wrap;
    }

    .colums3 div {
        width: 13%;
    }

    input[type="date"]::-webkit-inner-spin-button {
        display: none;
    }

    .item i,
    input[type="date"]::-webkit-calendar-picker-indicator {
        position: relative;
        font-size: 20px;
        color: #a3c2c2;
    }

    .item i {
        right: 1%;
        top: 30px;
        z-index: 1;
    }

    input[type=radio],
    input[type=checkbox] {
        display: none;
    }

    label.radio {
        position: relative;
        display: flex;
        margin: 5px 20px 15px 0;
        cursor: pointer;
    }

    .question span {
        margin-left: 30px;
    }

    .question-answer label {
        display: block;
    }

    label.radio:before {
        content: "";
        position: absolute;
        left: 0;
        width: 17px;
        height: 17px;
        border-radius: 50%;
        border: 2px solid #ccc;
    }

    input[type=radio]:checked+label:before,
    label.radio:hover:before {
        border: 2px solid #F48315;
    }

    label.radio:after {
        content: "";
        position: absolute;
        top: 6px;
        left: 5px;
        width: 8px;
        height: 4px;
        border: 3px solid #F48315;
        border-top: none;
        border-right: none;
        transform: rotate(-45deg);
        opacity: 0;
    }

    input[type=radio]:checked+label:after {
        opacity: 1;
    }

    .flex {
        display: flex;
        justify-content: space-around;
    }

    .btn-block {
        margin-top: 10px;
        text-align: center;
    }

    button {
        width: 150px;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background: #F48315;
        font-size: 16px;
        color: #fff;
        cursor: pointer;
    }

    button:hover {
        background: #a3c2c2;
    }

    @media (min-width: 568px) {

        .name-item,
        .city-item {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .name-item input,
        .name-item div {
            width: calc(50% - 20px);
        }

        .name-item div input {
            width: 97%;
        }

        .name-item div label {
            display: block;
            padding-bottom: 5px;
        }
    }

    .text-posisi {
        font-size: 26px;
    }
</style>
