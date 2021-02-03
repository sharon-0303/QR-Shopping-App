package com.example.shop;

import org.ksoap2.SoapEnvelope;
import org.ksoap2.serialization.SoapObject;
import org.ksoap2.serialization.SoapSerializationEnvelope;
import org.ksoap2.transport.HttpTransportSE;

import android.os.Build;
import android.os.Bundle;
import android.os.StrictMode;
import android.annotation.TargetApi;
import android.app.Activity;
import android.view.Menu;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class ForgotPassword extends Activity {

	EditText ed1,ed2;
	Button b;
	String namespace="urn:demo";
	String method="forgot";
	String soapaction="urn:demo/forgot";
	@TargetApi(Build.VERSION_CODES.GINGERBREAD) @Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_forgot_password);
		
		ed1=(EditText)findViewById(R.id.editText1);
		ed2=(EditText)findViewById(R.id.editText2);
		b=(Button)findViewById(R.id.button1);
		try
		{
			if(android.os.Build.VERSION.SDK_INT>9)
			{
				StrictMode.ThreadPolicy policy=new StrictMode.ThreadPolicy.Builder().permitAll().build();
				StrictMode.setThreadPolicy(policy);
			}
		}
		catch(Exception e)
		{
			
		}
		b.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
			
				String email=ed1.getText().toString();
				String phone=ed2.getText().toString();
				
				int flag=0;
				if(!android.util.Patterns.EMAIL_ADDRESS.matcher(email).matches()){
					ed1.setError("Enter valid email");
					ed1.setFocusable(true);
				}
				if(!android.util.Patterns.PHONE.matcher(phone).matches()){
					ed2.setError("Enter valid phone number");
					ed2.setFocusable(true);
				}
				
				if(flag==0){
					try {
						SoapObject sop=new SoapObject(namespace,method);
						sop.addProperty("email", email);
						sop.addProperty("phone", phone);
						
						SoapSerializationEnvelope sev=new SoapSerializationEnvelope(SoapEnvelope.VER11);
						sev.setOutputSoapObject(sop);
						
						HttpTransportSE htp=new HttpTransportSE(Login.url);
						htp.call(soapaction, sev);
						
						String res=sev.getResponse().toString();
						Toast.makeText(getApplicationContext(), res, Toast.LENGTH_LONG).show();
					} catch (Exception e) {
						// TODO: handle exception
						Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_LONG).show();
					}
				}
			}
		});
	}
}
