<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>OTP Confirmation</title>
</head>

<body
    style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f5f7fa; padding: 20px; margin: 0;">
    <table width="100%" cellpadding="0" cellspacing="0"
        style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden;">
        <tr>
            <td style="background-color: #007bff; color: #ffffff; text-align: center; padding: 20px 30px;">
                <h1 style="margin: 0; font-size: 24px;">OTP Verification</h1>
            </td>
        </tr>
        <tr>
            <td style="padding: 30px;">
                <p style="font-size: 16px; color: #333333;">Dear <strong>{{ $name }}</strong>,</p>

                <p style="font-size: 16px; color: #333333; margin-bottom: 20px;">
                    Thank you for registering with us. Please use the One-Time Password (OTP) below to complete your
                    verification:
                </p>

                <div style="text-align: center; margin: 30px 0;">
                    <span
                        style="font-size: 28px; font-weight: bold; background-color: #f0f0f0; padding: 12px 20px; border-radius: 6px; display: inline-block; color: #007bff;">
                        {{ $otp }}
                    </span>
                </div>

                <p style="font-size: 14px; color: #555555;">
                    This OTP is confidential and should not be shared with anyone. If you did not request this OTP,
                    please ignore this message.
                </p>

                <p style="font-size: 14px; color: #555555; margin-top: 30px;">
                    Best regards,<br>
                    <strong>City of Taguig - Yakap Center (ColorRun)</strong>
                </p>
            </td>
        </tr>
        <tr>
            <td style="background-color: #f0f2f5; text-align: center; padding: 15px; font-size: 12px; color: #888888;">
                &copy; {{ date('Y') }} City of Taguig. All rights reserved.
            </td>
        </tr>
    </table>
</body>

</html>