let pixelUnits = {
    '1px': '1px',
    '2px': '2px',
    '3px': '3px',
    '4px': '4px',
    '5px': '5px',
    '6px': '6px',
    '7px': '7px',
    '8px': '8px',
    '9px': '9px',
    '10px': '10px',
    '11px': '11px',
    '12px': '12px',
    '13px': '13px',
    '14px': '14px',
    '15px': '15px',
    '16px': '16px',
    '17px': '17px',
    '18px': '18px',
    '19px': '19px',
    '20px': '20px',
    '21px': '21px',
    '22px': '22px',
    '23px': '23px',
    '24px': '24px',
    '25px': '25px',
    '26px': '26px',
    '27px': '27px',
    '28px': '28px',
    '29px': '29px',
    '30px': '30px',
    '31px': '31px',
    '32px': '32px',
    '33px': '33px',
    '34px': '34px',
    '35px': '35px',
    '36px': '36px',
    '37px': '37px',
    '38px': '38px',
    '39px': '39px',
    '40px': '40px',
    '41px': '41px',
    '42px': '42px',
    '43px': '43px',
    '44px': '44px',
    '45px': '45px',
    '46px': '46px',
    '47px': '47px',
    '48px': '48px',
    '49px': '49px',
    '50px': '50px',
    '51px': '51px',
    '52px': '52px',
    '53px': '53px',
    '54px': '54px',
    '55px': '55px',
    '56px': '56px',
    '57px': '57px',
    '58px': '58px',
    '59px': '59px',
    '60px': '60px',
    '61px': '61px',
    '62px': '62px',
    '63px': '63px',
    '64px': '64px',
    '65px': '65px',
    '66px': '66px',
    '67px': '67px',
    '68px': '68px',
    '69px': '69px',
    '70px': '70px',
    '71px': '71px',
    '72px': '72px',
    '73px': '73px',
    '74px': '74px',
    '75px': '75px',
    '76px': '76px',
    '77px': '77px',
    '78px': '78px',
    '79px': '79px',
    '80px': '80px',
    '81px': '81px',
    '82px': '82px',
    '83px': '83px',
    '84px': '84px',
    '85px': '85px',
    '86px': '86px',
    '87px': '87px',
    '88px': '88px',
    '89px': '89px',
    '90px': '90px',
    '91px': '91px',
    '92px': '92px',
    '93px': '93px',
    '94px': '94px',
    '95px': '95px',
    '96px': '96px',
    '97px': '97px',
    '98px': '98px',
    '99px': '99px',
    '100px': '100px',
}

module.exports = {
    future: {
        removeDeprecatedGapUtilities: true,
        purgeLayersByDefault: true
    },

    purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php', './resources/js/**/*.vue'],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Roboto Condensed', 'sans-serif'],
            },
            fontSize: {
                ...pixelUnits
            },
            lineHeight: {
                ...pixelUnits
            },
            spacing: {
                ...pixelUnits
            },
            colors: {
                primary: '#BE0811',
                black: '#000000',
                gray: {
                    dark: '#666666',
                    default: '#B3B3B3',
                    light: '#CCCCCC'
                }
            },
            container: {
                center: true,
            },
            borderRadius: {
                '10px': '10px'
            }
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [require('@tailwindcss/ui')],
};
